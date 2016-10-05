<?php

use Illuminate\Database\Seeder;


use App\models\Opd;
use App\User;

class OpdsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    //
    $opds = array(
    'opd_1' => 'Universidad Tecnológica Bilingüe, Internacional y Sustentable del Estado de Puebla',
    'opd_2' => 'Universidad Tecnológica de Huejotzingo',
    'opd_3' => 'Universidad Tecnológica de Izúcar de Matamoros',
    'opd_4' => 'Universidad Tecnológica de Oriental',
    'opd_5' => 'Universidad Tecnológica de Puebla',
    'opd_6' => 'Universidad Tecnológica de Tecamachalco',
    'opd_7' => 'Universidad Tecnológica de Tehuacán',
    'opd_8' => 'Universidad Tecnológica de Xicotepec de Juárez',
    'opd_9' => 'Universidad Politécnica de Amozoc de Mota',
    'opd_10' => 'Universidad Politécnica de Puebla',
    'opd_11' => 'Universidad Politécnica Metropolitana de Puebla',
    'opd_12' => 'Universidad Intercultural del Estado de Puebla',
    'opd_13' => 'Universidad Interserrana del Estado de Puebla ',
    'opd_14' => 'Instituto Tecnológico Superior de Acatlán de Osorio',
    'opd_15' => 'Instituto Tecnológico Superior de Atlixco',
    'opd_16' => 'Instituto Tecnológico Superior de Ciudad Serdán',
    'opd_17' => 'Instituto Tecnológico Superior de Huachinango',
    'opd_18' => 'Instituto Tecnológico Superior de la Sierra Negra de Ajalpan',
    'opd_19' => 'Instituto Tecnológico Superior de Libres',
    'opd_20' => 'Instituto Tecnológico Superior de San Martín Texmelucan',
    'opd_21' => 'Instituto Tecnológico Superior de Tepeaca',
    'opd_22' => 'Instituto Tecnológico Superior de Tepexi de Rodriguez',
    'opd_23' => 'Instituto Tecnológico Superior de Teziutlán',
    'opd_24' => 'Instituto Tecnológico Superior de Tlatlauquitepec',
    'opd_25' => 'Instituto Tecnológico Superior de Venustiano Carranza',
    'opd_26' => 'Instituto Tecnológico Superior de Zacapoaxtla',
  );
    $user_data = array(
      'name' => '',
      'password' => bcrypt('d3v0pdG3n3rico'),
      'email'   => 'opdgenerico',
      'type'  =>'opd'
    );

    $opd_data = array(
      'opd_name' => '',
      'user_id'  => '',
    );
    $count  = 1;
  foreach ($opds as $opd) {
    # code...
    $user_data['name'] = $opd;
    $user_data['email'] = $user_data['email']."$count@vinculacion.com";
    $user = User::create($user_data);
    $opd_data['opd_name'] = $opd;
    $opd_data['user_id']  = $user->id;
    Opd::create($opd_data);
    $user_data["email"] = 'opdgenerico';
    $count++;
  }
}
}
