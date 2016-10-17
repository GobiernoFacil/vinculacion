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
Route::get('oferta-laboral', "Front@offers");
Route::get('oferta/{id}', "Front@offer");
Route::get('universidades', "Front@opds");
Route::get('universidad/{id}', "Front@opd");
Route::get('empresas', "Front@companies");
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
    Route::get('dashboard/administradores', 'Admin@admins');
    Route::get('dashboard/camaras', 'Admin@chambers');
    Route::get('dashboard/opds', 'Admin@opds');
    Route::get('dashboard/estudiantes', 'Admin@students');
    Route::get('dashboard/empresas', 'Admin@companies');
    Route::get('dashboard/vacantes', 'Admin@vacancies');

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
    Route::post('dashboard/empresa/buscar', 'AdminCompanies@search');

    Route::get('dashboard/empresa/habilitar/{id}', 'AdminCompanies@enableToogle');

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
    Route::get('dashboard/vacante/{id}/estudiantes', 'AdminVacancies@students');

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
    Route::get('dashboard/contrato/{id}/estudiantes', 'AdminContracts@students');

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
    Route::get("tablero-empresa/yo", "Companies@me");
    Route::get('tablero-empresa/yo/editar', 'Companies@changeMe');
    Route::post('tablero-empresa/yo/editar', 'Companies@updateMe');
    // @Companies controller
    Route::get("tablero-empresa/vacantes", "Companies@vacancies");
    Route::get("tablero-empresa/convenios", "Companies@contracts");
    // @CompaniesVacancies controller
    Route::get('tablero-empresa/vacante/crear', 'CompanyVacancies@add');
    Route::post('tablero-empresa/vacante/crear', 'CompanyVacancies@save');
    Route::get('tablero-empresa/vacante/editar/{id}', 'CompanyVacancies@edit');
    Route::post('tablero-empresa/vacante/editar/{id}', 'CompanyVacancies@update');
    Route::get('tablero-empresa/vacante/eliminar/{id}', 'CompanyVacancies@delete');
    Route::get('tablero-empresa/vacante/{id}', 'CompanyVacancies@view');
    Route::post('tablero-empresa/vacante/habilitar/{id}', 'CompanyVacancies@enable');
    Route::post('tablero-empresa/vacante/deshabilitar/{id}', 'CompanyVacancies@disable');
    // @CompaniesVacancies controller
    Route::get('tablero-empresa/vacante/{id}/estudiantes', 'CompanyVacancies@students');
    Route::get('tablero-empresa/vacante/{id}/estudiante/{student_id}', 'CompanyVacancies@student');
    Route::get('tablero-empresa/vacante/{id}/estudiante/{student_id}/calificar', 'CompanyVacancies@rateStudent');
    Route::get('tablero-empresa/vacante/{id}/entrevistas', 'CompanyVacancies@interviews');
    Route::get('tablero-empresa/vacante/{id}/entrevista/{interview_id}', 'CompanyVacancies@interviews');

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
    // dashboard and self
    Route::get("tablero-opd", "Opds@index");
    Route::get("tablero-opd/yo", "Opds@me");
    Route::get("tablero-opd/yo/editar", "Opds@changeMe");
    Route::post("tablero-opd/yo/editar", "Opds@updateMe");

    // students
    Route::get("tablero-opd/estudiantes", "Opds@students");
    Route::get("tablero-opd/estudiante/crear", "OpdStudents@add");
    Route::post("tablero-opd/estudiante/crear", "OpdStudents@save");
    Route::get("tablero-opd/estudiante/ver/{id}", "OpdStudents@view");
    Route::get("tablero-opd/estudiante/editar/{id}", "OpdStudents@edit");
    Route::post("tablero-opd/estudiante/editar/{id}", "OpdStudents@update");
    Route::get("tablero-opd/estudiante/eliminar/{id}", "OpdStudents@delete");
    Route::get("tablero-opd/estudiantes/actualizar/xlsx", "OpdStudents@addMultiple");
    Route::post("tablero-opd/estudiantes/actualizar/xlsx", "OpdStudents@saveMultiple");


    //companies
    Route::get("tablero-opd/empresas", "Opds@companies");
    Route::get("tablero-opd/empresa/ver/{id}", "OpdCompanies@view");
    Route::get("tablero-opd/empresa/crear", "OpdCompanies@add");
    Route::get("tablero-opd/empresa/editar/{id}", "OpdCompanies@edit");
    Route::post("tablero-opd/empresa/editar/{id}", "OpdCompanies@update");
    Route::get("tablero-opd/empresa/eliminar/{id}", "OpdCompanies@delete");
    Route::post("tablero-opd/empresa/crear", "OpdCompanies@save");
    Route::get("tablero-opd/empresas/actualizar/xlsx", "OpdCompanies@addMultiple");
    Route::post("tablero-opd/empresas/actualizar/xlsx", "OpdCompanies@saveMultiple");

    // stats
    Route::get("tablero-opd/estadisticas", "Opds@stats");

    // contracts
    Route::get("tablero-opd/convenios", "Opds@contracts");
    Route::get("tablero-opd/convenio/ver/{id}", "OpdContracts@view");
    Route::get("tablero-opd/convenio/crear", "OpdContracts@add");
    Route::post("tablero-opd/convenio/crear", "OpdContracts@save");
    Route::get("tablero-opd/convenio/editar/{id}", "OpdContracts@edit");
    Route::post("tablero-opd/convenio/editar/{id}", "OpdContracts@update");
    Route::get("tablero-opd/convenio/eliminar/{id}", "OpdContracts@delete");
  });






  /* RUTAS DEL ALUMNO
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:student' ], function(){
    Route::get("tablero-estudiante", "Students@index");
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
  Route::group(['middleware' => 'type:chamber'], function(){
    Route::get("tablero-camara", "Chambers@index");
  });





  /* RUTAS DE EMPLEOS PUEBLA
   * --------------------------------------------------------------------------------
   *
   */
  Route::group(['middleware' => 'type:puebla'], function(){
    Route::get("tablero-secotrade", "Puebla@index");
  });

});
Route::auth();

Route::get('/home', 'HomeController@index');
