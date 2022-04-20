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
Route::get('/areas', 'CoordinationController@areas')->name('areas.index');
Route::get('/areas/{area}/edit', 'CoordinationController@editareas')->name('areas.edit');
Route::put('/areas/{area}/update', 'CoordinationController@updateareas')->name('areas.update');

/* Requisiciones */

//Listar requisiciones dependiendo el departamento
Route::get('requisiciones/{requisicione}/list', 'RequisitionController@list')->name('requisiciones.list');
Route::get('requisiciones/{requisicione}/autorizadas-list', 'RequisitionController@autorizadaslist')->name('requisiciones.autorizadaslist');
Route::get('requisiciones/autorizadas', 'RequisitionController@autorizadas')->name('requisiciones.autorizadas');
Route::get('requisiciones/{requisicione}/list', 'RequisitionController@list')->name('requisiciones.list');
//Generar PDF de requiscion
Route::get('requisiciones/{requisicione}/requisition-pdf', 'RequisitionController@requisitionspdf')->name('requisiciones.reqpdf');
//Subir Autorizacion (view)
Route::get('requisiciones/{requisicione}/upload', 'RequisitionController@upload')->name('requisiciones.upload');
//Guardar Autorizacion
Route::put('requisiciones/{requisicione}/file_upload', 'RequisitionController@file_upload')->name('requisiciones.file_upload');//Guardar Autorizacion
//ELIMINAR AUTORIZACION
Route::get('requisiciones/{requisicione}/eliminar/autorizacion', 'RequisitionController@deleteautorizacion')->name('requisiciones.deleteautorizacion');
//Ver Requisicion Autorizada (view)
Route::get('requisiciones/autorizadas/{requisicione}', 'RequisitionController@requisitionauthorized')->name('requisiciones.authorized');

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
Route::post('coordinaciones/departamentos', 'CoordinationController@getDepartments')->name('coordinaciones.getDepartments');
Route::get('departamentos/data', 'DepartmentController@anyData')->name('departamentos.data');
Route::get('roles/data', 'RoleController@anyData')->name('roles.data');
Route::get('proveedores/data', 'ProvidersController@anyData')->name('proveedores.data');
Route::get('cotizaciones/data', 'QuotesrequisitionsController@anyData')->name('cotizaciones.data');

Route::resources([
    //'empleados' => 'EmpleadosController',
    'usuarios' => 'UserController',
    'coordinaciones' => 'CoordinationController',
    'departamentos' => 'DepartmentController',
    'permisos' => 'PermissionController',
    'roles' => 'RoleController',
    'requisiciones' => 'RequisitionController',
    'almacen' => 'StorehouseController',
    'proveedores' => 'ProvidersController',
    'cotizaciones' => 'QuotesrequisitionsController',
    '/compras/ordenes' => 'PurchaseOrderController',
    '/compras/autorizadas' => 'PurchaseController',
    '/compras/facturas' => 'PurchaseInvoiceController'
]);
