<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(OnlyAdminSeeder::class);
      $this->call(RealOpdSeeder::class);
      $this->call(AddCitiesAndCountries::class);
      $this->call(AddPostcodes::class);
    }
}
