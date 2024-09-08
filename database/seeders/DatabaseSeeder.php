<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Services\Lead\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();

        foreach (StatusEnum::cases() as $status){
            \App\Models\Status::query()->create([
                'status' => $status
            ]);
        }



    }
}
