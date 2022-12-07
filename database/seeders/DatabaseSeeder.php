<?php

namespace Database\Seeders;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
         $this->call(CategorySeeder::class);
        $this->call(PermissionsSeeder::class);
       $this->call(CurrencySeeder::class);
        $this->call(QuestionAnswer::class);

    }
}
