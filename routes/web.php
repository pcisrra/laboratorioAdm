<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Localizaciones
    Route::delete('localizaciones/destroy', 'LocalizacionesController@massDestroy')->name('localizaciones.massDestroy');
    Route::post('localizaciones/media', 'LocalizacionesController@storeMedia')->name('localizaciones.storeMedia');
    Route::post('localizaciones/ckmedia', 'LocalizacionesController@storeCKEditorImages')->name('localizaciones.storeCKEditorImages');
    Route::resource('localizaciones', 'LocalizacionesController');

    // Materiales
    Route::delete('materiales/destroy', 'MaterialesController@massDestroy')->name('materiales.massDestroy');
    Route::resource('materiales', 'MaterialesController');

    // Activos
    Route::delete('activos/destroy', 'ActivosController@massDestroy')->name('activos.massDestroy');
    Route::resource('activos', 'ActivosController');

    // Muestras
    Route::delete('muestras/destroy', 'MuestrasController@massDestroy')->name('muestras.massDestroy');
    Route::resource('muestras', 'MuestrasController');

    // Herramienta
    Route::delete('herramienta/destroy', 'HerramientasController@massDestroy')->name('herramienta.massDestroy');
    Route::resource('herramienta', 'HerramientasController');

    // Solicitudes
    Route::delete('solicitudes/destroy', 'SolicitudesController@massDestroy')->name('solicitudes.massDestroy');
    Route::resource('solicitudes', 'SolicitudesController');

    // Plan Compras
    Route::delete('plan-compras/destroy', 'PlanCompraController@massDestroy')->name('plan-compras.massDestroy');
    Route::resource('plan-compras', 'PlanCompraController');

    // Ingreso Materiales
    Route::delete('ingreso-materiales/destroy', 'IngresoMaterialesController@massDestroy')->name('ingreso-materiales.massDestroy');
    Route::resource('ingreso-materiales', 'IngresoMaterialesController');

    // Beneficiarios
    Route::delete('beneficiarios/destroy', 'BeneficiarioController@massDestroy')->name('beneficiarios.massDestroy');
    Route::resource('beneficiarios', 'BeneficiarioController');

    // Maquinas
    Route::delete('maquinas/destroy', 'MaquinaController@massDestroy')->name('maquinas.massDestroy');
    Route::post('maquinas/media', 'MaquinaController@storeMedia')->name('maquinas.storeMedia');
    Route::post('maquinas/ckmedia', 'MaquinaController@storeCKEditorImages')->name('maquinas.storeCKEditorImages');
    Route::resource('maquinas', 'MaquinaController');

    // Asistencia Tecnicas
    Route::delete('asistencia-tecnicas/destroy', 'AsistenciaTecnicaController@massDestroy')->name('asistencia-tecnicas.massDestroy');
    Route::resource('asistencia-tecnicas', 'AsistenciaTecnicaController');

    // Diseno Asistidos
    Route::delete('diseno-asistidos/destroy', 'DisenoAsistidoController@massDestroy')->name('diseno-asistidos.massDestroy');
    Route::resource('diseno-asistidos', 'DisenoAsistidoController');

    // Capacitacions
    Route::delete('capacitacions/destroy', 'CapacitacionController@massDestroy')->name('capacitacions.massDestroy');
    Route::resource('capacitacions', 'CapacitacionController');

    // Fabricacions
    Route::delete('fabricacions/destroy', 'FabricacionController@massDestroy')->name('fabricacions.massDestroy');
    Route::resource('fabricacions', 'FabricacionController');

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }

});
