<?php
// Ruta de inicio welcome con funcion para retornar directo a login a home

Route::get('/', function () {
    if(auth()->check()){
        return view('home');
    }else{
        return view('auth.login');
    }
});
/* Ruta auth */
Auth::routes(['register' => false]);
/* Route home */
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/daterange', 'HomeController@daterange')->name('home.daterange');
/* Route areas devuelve las relaciones de las coordinaciones y departamentos*/


/** AREAS */

Route::group(['prefix' => 'dependencias'], function() {
    Route::apiResource('areas', Areas\GeneralController::class)->only(['index','edit','update']);
    Route::resource('coordinaciones', Areas\CoordinationController::class);
    Route::resource('departamentos', Areas\DepartmentController::class);
    Route::post('coordinaciones/departamentos', 'Areas\CoordinationController@getDepartments')->name('coordinaciones.getDepartments');
    Route::get('departamentos/data', 'Areas\DepartmentController@anyData')->name('departamentos.data');
});


/* Requisiciones */
Route::group(['prefix' => 'requisiciones'], function() {
    //Listar requisiciones dependiendo el departamento
    Route::resource('request', Requisiciones\RequestController::class);
    Route::resource('authorized', Requisiciones\AuthorizeController::class)->only(['index','show','destroy']);

    //Generar PDF de requiscion
    Route::get('/{requisicione}/requisition-pdf', 'RequisitionController@requisitionspdf')->name('requisiciones.reqpdf');
    //Subir Autorizacion (view)
    Route::get('/{requisicione}/upload', 'RequisitionController@upload')->name('requisiciones.upload');
    //Guardar Autorizacion
    Route::put('/{requisicione}/file_upload', 'RequisitionController@file_upload')->name('requisiciones.file_upload');//Guardar Autorizacion

});

/* Cotizaciones */

//Listar cotizaciones dependiendo el departamento
Route::get('cotizaciones/{cotizacione}/list', 'QuotesrequisitionsController@list')->name('cotizaciones.list');
//Crear nueva cotizacion (view)
Route::get('cotizaciones/{cotizacione}/nueva','QuotesrequisitionsController@nueva')->name('cotizaciones.nueva');
//Guardar nueva cotizacion
Route::post('cotizaciones/nueva','QuotesrequisitionsController@new')->name('cotizaciones.new');
//Editar cotizacion (view)
Route::get('cotizaciones/{cotizacione}/actualizar', 'QuotesrequisitionsController@actualizar')->name('cotizaciones.actualizar');
//Eliminar cotizacion individualmente
Route::delete('cotizaciones/{cotizacione}/delete', 'QuotesrequisitionsController@delete')->name('cotizaciones.delete');

/* Ordenes de compras*/
//Listar ordenes de compra por departamento
Route::get('compras/ordenes/{ordenes}/list', 'PurchaseOrderController@list')->name('ordenes.list');

Route::post('compras/ordenes/autorizar', 'PurchaseOrderController@ordenes_autorizar')->name('ordenes.autorizar_ordenes');
Route::post('compras/ordenes/no_autorizar', 'PurchaseOrderController@ordenes_no_autorizar')->name('ordenes.ordenes_no_autorizar');
Route::get('compras/ordenes/autorizar', 'PurchaseOrderController@getordenes')->name('ordenes.getordenes');
Route::get('compras/ordenes/details/{ordenes}', 'PurchaseOrderController@details')->name('ordenes.details');
//Ver orden de compra generada
Route::get('compras/ordenes/{ordenes}/ordencompra', 'PurchaseOrderController@order')->name('ordenes.ordencompra');
//Generar PDF de la orden de compra
Route::get('compras/ordenes/{ordenes}/orden_compra_pdf', 'PurchaseOrderController@pdf')->name('ordenes.pdf');
// Subir Facturas de las ordenes de compra vista
Route::get('compras/ordenes/{ordenes}/subirfactura','PurchaseOrderController@factura')->name('ordenes.factura');
// Subir Facturas de las ordenes de compra
Route::put('compras/ordenes/{ordenes}/subirfactura','PurchaseOrderController@factura_upload')->name('ordenes.factura_upload');
//Vista para subir Orden de Compra autorizada o firmada
Route::get('compras/ordenes/{ordenes}/autorizada', 'PurchaseOrderController@edit')->name('ordenes.autorizada');
//Subir Orden Firmada
Route::put('compras/ordenes/{ordenes}/autorizada', 'PurchaseOrderController@upload')->name('ordenes.orden_autorizada');
/* Compras */

/* ORDENES AUTORIZADAS*/
//Listar ordenes autorizadas dependiendo el departamento
Route::get('compras/autorizadas/{autorizada}/list', 'PurchaseController@list')->name('autorizadas.list');
Route::delete('compras/{autorizadas}/eliminar/autorizacion', 'PurchaseController@deleteautorizacion')->name('autorizadas.deleteautorizacion');

/* FACTURAS DE ORDENES AUTORIZADAS*/
//Listar ordenes autorizadas dependiendo el departamento
Route::get('compras/facturas/{facturas}/list', 'PurchaseInvoiceController@list')->name('facturas.list');
/* RoutesControllers Resource */

/* RUTAS PARA AJAX */

Route::get('usuarios/data', 'UserController@anyData')->name('usuarios.data');
Route::get('permisos/data', 'PermissionController@anyData')->name('permisos.data');
Route::get('roles/data', 'RoleController@anyData')->name('roles.data');
Route::get('proveedores/data', 'ProvidersController@anyData')->name('proveedores.data');
Route::get('cotizaciones/data', 'QuotesrequisitionsController@anyData')->name('cotizaciones.data');

Route::resources([
    //'empleados' => 'EmpleadosController',
    'usuarios' => 'UserController',

    'permisos' => 'PermissionController',
    'roles' => 'RoleController',
    'almacen' => 'StorehouseController',
    'proveedores' => 'ProvidersController',
    'cotizaciones' => 'QuotesrequisitionsController',
    '/compras/ordenes' => 'PurchaseOrderController',
    '/compras/autorizadas' => 'PurchaseController',
    '/compras/facturas' => 'PurchaseInvoiceController'
]);
