<?php

namespace App\Services\User;

use App\DTOs\User\RegisteredDTO;
use App\DTOs\User\ResetPasswordDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthService
{

    public static function registered(RegisteredDTO $dto): Model|Builder
    {
       return User::query()->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => bcrypt($dto->password)
        ]);
    }

    public static function changePassword(ResetPasswordDTO $dto)
    {
         return Password::reset([
            'token' => $dto->token,
            'email' => $dto->email,
            'password' => $dto->password
        ], function ($user) use ($dto) {
            $user->forceFill([
                'password' => bcrypt($dto->password),
                'remember_token' => Str::random(60)
            ])->save();
        }
        );
    }

}
