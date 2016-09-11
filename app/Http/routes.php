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
Route::get('universidad/{id}', "Front@opd");
Route::get('empresas/{page?}', "Front@companies");
Route::get('empresa/{id}', "Front@company");
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
    // @Admin controller
    Route::get('dashboard', 'Admin@index');
    Route::get('dashboard/usuarios/{page?}', 'Admin@users');
    Route::get('dashboard/administradores/{page?}', 'Admin@admins');
    Route::get('dashboard/camaras/{page?}', 'Admin@chambers');
    Route::get('dashboard/opds/{page?}', 'Admin@opds');
    Route::get('dashboard/estudiantes/{page?}', 'Admin@students');
    Route::get('dashboard/empresas/{page?}', 'Admin@companies');
    Route::get('dashboard/vacantes/{page?}', 'Admin@vacancies');

    // P E R F I L   D E L   A D M I N I S T R A D O R
    // ----------------------------------------------------------------
    // @Admin controller
    Route::get('dashboard/yo', 'Admin@me');
    Route::get('dashboard/yo/editar', 'Admin@changeMe');
    Route::post('dashboard/yo/editar', 'Admin@updateMe');

    // A D M I N I S T R A D O R E S
    // ----------------------------------------------------------------
    // @Admin controller
    Route::get('dashboard/administrador/crear', 'Admin@add');
    Route::post('dashboard/administrador/crear', 'Admin@save');
    Route::get('dashboard/administrador/editar/{id}', 'Admin@edit');
    Route::post('dashboard/administrador/editar/{id}', 'Admin@update');
    Route::get('dashboard/administrador/eliminar/{id}', 'Admin@delete');
    Route::get('dashboard/administrador/{id}', 'Admin@view');

    // E S T U D I A N T E S
    // ----------------------------------------------------------------
    // @AdminStudents controller
    Route::get('dashboard/estudiante/crear', 'AdminStudents@add');
    Route::post('dashboard/estudiante/crear', 'AdminStudents@save');
    Route::get('dashboard/estudiante/editar/{id}', 'AdminStudents@edit');
    Route::post('dashboard/estudiante/editar/{id}', 'AdminStudents@update');
    Route::get('dashboard/estudiante/eliminar/{id}', 'AdminStudents@delete');
    Route::get('dashboard/estudiante/{id}', 'AdminStudents@view');

    // C Á M A R A S
    // ----------------------------------------------------------------
    // @AdminChambers controller
    Route::get('dashboard/camara/crear', 'AdminChambers@add');
    Route::post('dashboard/camara/crear', 'AdminChambers@save');
    Route::get('dashboard/camara/editar/{id}', 'AdminChambers@edit');
    Route::post('dashboard/camara/editar/{id}', 'AdminChambers@update');
    Route::get('dashboard/camara/eliminar/{id}', 'AdminChambers@delete');
    Route::get('dashboard/camara/{id}', 'AdminChambers@view');

    // E M P R E S A S
    // ----------------------------------------------------------------
    // @AdminCompanies controller
    Route::get('dashboard/empresa/crear', 'AdminCompanies@add');
    Route::post('dashboard/empresa/crear', 'AdminCompanies@save');
    Route::get('dashboard/empresa/editar/{id}', 'AdminCompanies@edit');
    Route::post('dashboard/empresa/editar/{id}', 'AdminCompanies@update');
    Route::get('dashboard/empresa/eliminar/{id}', 'AdminCompanies@delete');
    Route::get('dashboard/empresa/{id}', 'AdminCompanies@view');
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
