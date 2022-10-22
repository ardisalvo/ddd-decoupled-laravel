<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class Applications extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Application::factory(50)->create();
    }
}
