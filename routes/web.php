<?php
/*Copyright (C) 2019 Prof Matias Garcia para -http://www.profmatiasgarcia.com.ar- con licencia GNU GPL3.
Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los términos de la Licencia Pública General de GNU según es publicada por la Free Software Foundation, bien con la versión 3 de dicha Licencia o bien (según su elección) con cualquier versión posterior. Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de GNU para más detalles.
Debería haber recibido una copia de la Licencia Pública General junto con este programa. Si no ha sido así ingrese a -http://www.gnu.org/licenses/-*/

Route::get('/', 'ProductoController@listar');

Route::get('/productos', 'ProductoController@listar');

Route::get('/productos/mostra/{id}', 'ProductoController@mostra')->where('id', '[0-9]+')->name('mostrar');

Route::get('/productos/nuevo', 'ProductoController@nuevo');

Route::post('/productos/adiciona', 'ProductoController@adiciona')->name('ingresarnuevo');

Route::get('/productos/eliminar/{id}', 'ProductoController@eliminar')->where('id', '[0-9]+')->name('eliminar') ;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
