<?php

use App\Http\Controllers\Settings\UserController;

Route::get('/', function () {
    if(auth()->check()){
        Route::get('/home', 'HomeController@index')->name('home');
    }else{
        return view('auth.login');
    }
});
/* Ruta auth */
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

/** DEPENDENCIAS - AREAS - COORDINACIONES - DEPARTAMENTOS */
Route::group(['prefix' => 'areas'], function() {
    Route::resource('dependencias', Areas\DependencyController::class);
    Route::resource('coordinaciones', Areas\CoordinationController::class);
    Route::resource('departamentos', Areas\DepartmentController::class);
    Route::post('coordinaciones/departamentos', 'Areas\CoordinationController@getDepartments')->name('coordinaciones.getDepartments');
    Route::get('departamentos/data', 'Areas\DepartmentController@anyData')->name('departamentos.data');
});


/* REQUISICIONES - SOLICITUDES - AUTORIZAR */
Route::group(['prefix' => 'requisiciones'], function() {
    Route::resource('request', Requisiciones\RequestController::class);
    Route::resource('authorized', Requisiciones\AuthorizeController::class)->only(['index','show','destroy']);
    //Subir Autorizacion (view)
    Route::get('/{requisicione}/upload', 'RequisitionController@upload')->name('requisiciones.upload');
    //Guardar Autorizacion
    Route::put('/{requisicione}/file_upload', 'RequisitionController@file_upload')->name('requisiciones.file_upload');//Guardar Autorizacion
});

/* COTIZACIONES */
Route::controller(QuotesrequisitionsController::class)->group(function () {
    Route::resource('cotizaciones', QuotesrequisitionsController::class);
    Route::group(['prefix' => 'cotizaciones'], function() {
        Route::get('/{cotizacione}/list', 'list')->name('cotizaciones.list');
        Route::get('/{cotizacione}/nueva', 'nueva')->name('cotizaciones.nueva');
        Route::post('/nueva', 'new')->name('cotizaciones.new');
        Route::get('/{cotizacione}/actualizar', 'actualizar')->name('cotizaciones.actualizar');
        Route::delete('/{cotizacione}/delete', 'delete')->name('cotizaciones.delete');
    });
});

/** COMPRAS - ORDENES - AUTORIZADAS */
Route::group(['prefix' => 'compras'], function() {
    Route::resource('ordenes', Compras\PurchaseOrderController::class);
    Route::resource('autorizadas', Compras\PurchaseController::class);
    Route::resource('facturas', Compras\PurchaseInvoiceController::class);

    Route::controller(Compras\PurchaseOrderController::class)->group(function () {
        Route::group(['prefix' => 'ordenes'], function() {
            Route::get('/{ordenes}/list', 'list')->name('ordenes.list');
            Route::post('autorizar', 'ordenes_autorizar')->name('ordenes.autorizar_ordenes');
            Route::post('no_autorizar', 'ordenes_no_autorizar')->name('ordenes.ordenes_no_autorizar');
            Route::get('/autorizar', 'getordenes')->name('ordenes.getordenes');
            Route::get('/autorizar', 'getordenes')->name('ordenes.getordenes');
            Route::get('/autorizar', 'getordenes')->name('ordenes.getordenes');
            Route::get('/details/{ordenes}', 'details')->name('ordenes.details');
            Route::get('/{ordenes}/ordencompra', 'order')->name('ordenes.ordencompra');
            Route::get('/{ordenes}/orden_compra_pdf', 'pdf')->name('ordenes.pdf');
            Route::put('/{ordenes}/subirfactura', 'factura')->name('ordenes.factura');
            Route::get('/{ordenes}/autorizada', 'edit')->name('ordenes.autorizada');
            Route::put('/{ordenes}/autorizada', 'upload')->name('ordenes.orden_autorizada');
        });
    });
    Route::controller(Compras\PurchaseController::class)->group(function () {
        Route::group(['prefix' => 'autorizadas'], function() {
            Route::get('{autorizada}/list', 'list')->name('autorizadas.list');
            Route::delete('eliminar/autorizacion', 'deleteautorizacion')->name('autorizadas.deleteautorizacion');
        });
    });
    Route::controller(Compras\PurchaseInvoiceController::class)->group(function () {
        Route::group(['prefix' => 'facturas'], function() {
            Route::get('{facturas}/list', 'list')->name('facturas.list');
        });
    });

});

Route::group(['prefix' => 'settings'], function() {
    Route::resource('usuarios', Settings\UserController::class  );
    Route::resource('permisos', Settings\PermissionController::class    );
    Route::resource('roles',    Settings\RoleController::class  );
});

Route::group(['prefix' => 'pdf'], function() {
    Route::get('test_request', 'PDF\PDFController@requisition_pdf');
    Route::get('test_order', 'PDF\PDFController@order_pdf');

    Route::group(['prefix' => 'generate'], function() {
        Route::get('request/{request}', 'PDF\PDFController@generate_pdf_request')->name('pdf.request_gt');
        Route::get('order/{order}', 'PDF\PDFController@generate_pdf_order')->name('pdf.order_gt');
    });
    Route::group(['prefix' => 'download'], function() {
        Route::get('download', 'PDF\PDFController@download_pdf_request')->name('pdf.request_dl');

    });
});

// Route::get('usuarios/data', 'Settings\UserController@anyData')->name('usuarios.data');
// Route::get('permisos/data', 'Settings\PermissionController@anyData')->name('permisos.data');
// Route::post('coordinaciones/departamentos', 'Areas\CoordinationController@getDepartments')->name('coordinaciones.getDepartments');
// Route::get('departamentos/data', 'Areas\DepartmentController@anyData')->name('departamentos.data');
// Route::get('roles/data', 'Settings\RoleController@anyData')->name('roles.data');
// Route::get('proveedores/data', 'ProvidersController@anyData')->name('proveedores.data');
// Route::get('cotizaciones/data', 'QuotesrequisitionsController@anyData')->name('cotizaciones.data');

Route::resources([
    //'empleados' => 'EmpleadosController',
    'almacen' => 'StorehouseController',
    'proveedores' => 'ProvidersController',
]);
