<?php

namespace Database\Seeders;

use App\Models\Lead;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Lead::factory()->count(50)->create();
//        factory(Lead::class, 50)->create();
    }
}
