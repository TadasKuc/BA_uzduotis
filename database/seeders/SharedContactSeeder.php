<?php

namespace Database\Seeders;

use App\Models\SharedContact;
use Illuminate\Database\Seeder;

class SharedContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SharedContact::factory()->count(20)->create();
    }
}
