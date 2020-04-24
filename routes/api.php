<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Localizaciones
    Route::post('localizaciones/media', 'LocalizacionesApiController@storeMedia')->name('localizaciones.storeMedia');
    Route::apiResource('localizaciones', 'LocalizacionesApiController');

    // Materiales
    Route::apiResource('materiales', 'MaterialesApiController');

    // Activos
    Route::apiResource('activos', 'ActivosApiController');

    // Muestras
    Route::apiResource('muestras', 'MuestrasApiController');

    // Herramienta
    Route::apiResource('herramienta', 'HerramientasApiController');

    // Solicitudes
    Route::apiResource('solicitudes', 'SolicitudesApiController');

    // Ingreso Materiales
    Route::apiResource('ingreso-materiales', 'IngresoMaterialesApiController');

    // Beneficiarios
    Route::apiResource('beneficiarios', 'BeneficiarioApiController');

    // Maquinas
    Route::post('maquinas/media', 'MaquinaApiController@storeMedia')->name('maquinas.storeMedia');
    Route::apiResource('maquinas', 'MaquinaApiController');

    // Asistencia Tecnicas
    Route::apiResource('asistencia-tecnicas', 'AsistenciaTecnicaApiController');

    // Diseno Asistidos
    Route::apiResource('diseno-asistidos', 'DisenoAsistidoApiController');

    // Capacitacions
    Route::apiResource('capacitacions', 'CapacitacionApiController');

    // Fabricacions
    Route::apiResource('fabricacions', 'FabricacionApiController');

});
