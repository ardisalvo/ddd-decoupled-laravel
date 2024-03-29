<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class Companies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory(10)->create();
    }
}
