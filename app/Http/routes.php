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



/* RUTAS PARA REGISTRO
 * --------------------------------------------------------------------------------
 *
 */

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





  /* R U T A S   D E L   A D M I N
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:admin' ], function(){

    // D A S H B O A R D   Y   L I S T A   D E   U S U A R I O S
    // ----------------------------------------------------------------
    // @Admin controller
    Route::get('dashboard', 'Admin@index');
    //Route::get('dashboard/usuarios/{page?}', 'Admin@users');
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

    // O P D S
    // ----------------------------------------------------------------
    // @AdminOpds controller
    Route::get('dashboard/opd/crear', 'AdminOpds@add');
    Route::post('dashboard/opd/crear', 'AdminOpds@save');
    Route::get('dashboard/opd/editar/{id}', 'AdminOpds@edit');
    Route::post('dashboard/opd/editar/{id}', 'AdminOpds@update');
    Route::get('dashboard/opd/eliminar/{id}', 'AdminOpds@delete');
    Route::get('dashboard/opd/{id}', 'AdminOpds@view');

    // V A C A N T E S
    // ----------------------------------------------------------------
    // @AdminVacancies controller
    Route::get('dashboard/vacante/crear', 'AdminVacancies@add');
    Route::post('dashboard/vacante/crear', 'AdminVacancies@save');
    Route::get('dashboard/vacante/editar/{id}', 'AdminVacancies@edit');
    Route::post('dashboard/vacante/editar/{id}', 'AdminVacancies@update');
    Route::get('dashboard/vacante/eliminar/{id}', 'AdminVacancies@delete');
    Route::get('dashboard/vacante/{id}', 'AdminVacancies@view');
    Route::post('dashboard/vacante/habilitar/{id}', 'AdminVacancies@enable');
    Route::post('dashboard/vacante/deshabilitar/{id}', 'AdminVacancies@disable');
    Route::get('dashboard/vacante/{id}/estudiantes/{page?}', 'AdminVacancies@students');

    // C O N T R A T O S
    // ----------------------------------------------------------------
    // @AdminContracts controller
    Route::get('dashboard/contrato/crear', 'AdminContracts@add');
    Route::post('dashboard/contrato/crear', 'AdminContracts@save');
    Route::get('dashboard/contrato/editar/{id}', 'AdminContracts@edit');
    Route::post('dashboard/contrato/editar/{id}', 'AdminContracts@update');
    Route::get('dashboard/contrato/eliminar/{id}', 'AdminContracts@delete');
    Route::get('dashboard/contrato/{id}', 'AdminContracts@view');
    Route::post('dashboard/contrato/habilitar/{id}', 'AdminContracts@enable');
    Route::post('dashboard/contrato/deshabilitar/{id}', 'AdminContracts@disable');
    Route::get('dashboard/contrato/{id}/estudiantes/{page?}', 'AdminContracts@students');

    // E S T A D Í S T I C A S
    // ----------------------------------------------------------------
    // @AdminStatistics controller
    Route::get('dashboard/estadisticas', 'AdminStatistics@index');
  });





  /* RUTAS DE LA EMPRESA
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:company' ], function(){
    // @Companies controller
    Route::get("tablero-empresa", "Companies@index");
    //
    // AQUÍ LAS RUTAS PARA USUARIO VERIFICADO
    //
    Route::group(['middleware' => 'verify:tablero-empresa' ], function(){
      // Aquí está por definir qué no puede hacer una empresa no registrada
    });
  });






  /* RUTAS DE LA OPD
   * --------------------------------------------------------------------------------
   *
   */
  Route::group([ 'middleware' => 'type:opd' ], function(){

  });






  /* RUTAS DEL ALUMNO
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:student' ], function(){
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
  Route::group(['middleware' => 'type:chamber' ], function(){

  });
});
Route::auth();

Route::get('/home', 'HomeController@index');
