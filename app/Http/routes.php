<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// @Front controller
// Las páginas estáticas y de consulta
Route::get('/', "Front@index");
Route::get('oferta-laboral/{page?}', "Front@offers");
Route::get('oferta/{id}', "Front@offer");
Route::get('universidades/{page?}', "Front@opds");
Route::get('universidade/{id}', "Front@opd");
Route::get('datos-abiertos', "Front@openData");
Route::get('privacidad', "Front@privacy");

// @Suscribe controller
// el proceso de inscripción
Route::get('registro', "Suscribe@index");
Route::post('registro', "Suscribe@suscribe");

/* RUTAS QUE REQUIEREN VALIDACIÓN
 * --------------------------------------------------------------------------------
 *
 */

Route::group(['middleware' => ['auth']], function () {
  // @Suscribe controller
  // una vez autorizado el usuario, se redireciona al dashboard que le corresponde
  Route::get('guide-me', 'Suscribe@redirectToDashboard');






  /* RUTAS DEL ADMIN
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:admin,dashbard' ], function(){
    
    // D A S H B O A R D   Y   L I S T A   D E   U S U A R I O S
    // ----------------------------------------------------------------
    Route::get('dashboard', 'Admin@index');
  });





  /* RUTAS DE LA EMPRESA
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:company,tablero-empresa' ], function(){
    //
    // AQUÍ LAS RUTAS PARA USUARIO VERIFICADO
    //
    Route::group(['middleware' => 'verify:tablero-empresa' ], function(){

    });
  });






  /* RUTAS DE LA OPD
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:opd,tablero-opd' ], function(){

  });






  /* RUTAS DEL ALUMNO
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:student,tablero-estudiante' ], function(){
    //
    // AQUÍ LAS RUTAS PARA USUARIO VERIFICADO
    //
    Route::group(['middleware' => 'verify:tablero-estudiante' ], function(){

    });
  });






  /* RUTAS DE LA CÁMARA
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:chamber,tablero-camara' ], function(){

  });
});
Route::auth();

Route::get('/home', 'HomeController@index');
