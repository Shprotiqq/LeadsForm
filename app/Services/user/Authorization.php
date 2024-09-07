<?php

namespace App\Services\user;

use App\DTOs\User\RegisteredDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Authorization
{

    public static function registered(RegisteredDTO $dto): Model|Builder
    {
       return User::query()->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => bcrypt($dto->password)
        ]);
    }

    public static function changePassword( $dto): bool|int
    {
        return User::query()
            ->findOrFail($dto->id)
            ->update([
                'password' => $dto->password
            ]);
    }

}
