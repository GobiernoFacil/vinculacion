<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use League\Csv\Reader;

class AddCitiesAndCountries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      Model::unguard();

      $this->call('CitiesTableSeeder');
      $this->command->info('cities table seeded!');

      $this->call('CountriesTableSeeder');
      $this->command->info('countries table seeded!');

      Model::reguard();
    }
}

/**
* Define the method to load the CSV for each table
* 
*/
trait LoadCSV{
  public function save_csv($file_path, $table){
    // recomendación de la librería de CSV para mac OSX
    if (! ini_get("auto_detect_line_endings")){
      ini_set("auto_detect_line_endings", '1');
    }
    // elimina todo lo que hay en la tabla
    DB::table($table)->delete();

    // genera y configura el lector de CSV
    $reader = Reader::createFromPath($file_path);

    // guarda los datos del CSV en la tabla
    $data = $reader->fetchAssoc();
    foreach($data as $row){
      /* small fix for the trusts table */
      if(isset($row['initial_date_date']) && $row['initial_date_date'] =="NULL"){
        $row['initial_date_date'] = "0000-00-00";
      }
      /***/
      DB::table($table)->insert($row);
    }
  }
}

/**
* The cities table
*
*/
class CitiesTableSeeder extends Seeder{
  use LoadCSV;
  public function run(){
    $this->save_csv(base_path() . "/data/cities.csv", "cities");
  }
}

/**
* The countries table
*
*/
class CountriesTableSeeder extends Seeder{
  use LoadCSV;
  public function run(){
    $this->save_csv(base_path() . "/data/countries.csv", "countries");
  }
}