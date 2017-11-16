<?php

#Rutas para la página informativa
Route::group(['prefix' => '/'], function () {
    Route::get('/prueba',function(){return view('boletos.pruebaIvan');});
    Route::get('/', 'Pagina@index');
    Route::post('/conctacto', 'Pagina@contact');
    Route::get('/team', function() { return view('pagina.desarrolladores'); });
    Route::get('/ferrocarril', function() { return view('pagina.ferrocarril'); });
    Route::get('/presidentes', function() { return view('pagina.presidentes'); });
    Route::get('/administracion', function() { return view('pagina.equipo'); });
    Route::get('/contacto', function() { return view('pagina.contacto'); });
    Route::get('/eventos', 'Pagina@eventos');
    Route::get('/libros', 'Pagina@libros');
    Route::get('/busquedalibros', function() { return view('pagina.libros2'); });
    Route::get('/buscarLibro','LibroController@search');
    Route::get('/buscarLibro2','LibroController@searchsystem');

});

//Rutas de prueba para la ficha informativa
Route::any('/fichaJP/{id}', 'AsistenteController@fichaJP');

Route::middleware(['admin'])->group(function () {
  Route::resource('/Empleado','EmpleadoController');
  Route::resource('/PruebaBoleto','TestBoletoController');
  Route::get('/GenerarBoleto', function() { return view('boletos.local'); });
  Route::resource('boletos','BoletoController');
  Route::resource('rangos','RangoEdadeController');
  Route::resource('visitantes','TipoVisitantesController');
  Route::resource('tarifas','TarifaController');
  Route::get('/find/{param1}{param2}','BoletoController@findtarifa');
  Route::resource('/Pieza','PiezaController');
  Route::resource('/TipoPieza','TipoPiezaController');
  Route::get('/buscarpieza','PiezaController@search');
  Route::resource('/Genero','GeneroController');
  Route::resource('/Libro','LibroController');
  Route::resource('/Editorial','EditorialeController');
  Route::resource('/Autor','AutoreController');
  Route::resource('/Categoria','CategoriaController');
  Route::resource('/Adquisiciones','AdquisicioneController');
  Route::resource('/TipoAdquisicion','TipoAdquisicioneController');
  Route::resource('/Asistente','AsistenteController');
  Route::resource('/Donante','DonanteController');
  Route::resource('/Rol','RoleController');
  Route::resource('/PDF','PDF2Controller');
  Route::resource('/FichaInformativa','FichasInformativaController');
  Route::resource('/Boleto','TestBoletoController');
  Route::resource('Evento','EventoController');
  Route::resource('DatoCurioso','DatoscuriosoController');
  Route::get('Random','DatoscuriosoController@ran');
  Route::get('/buscardon','AdquisicioneController@search');
  Route::group(['prefix' => '/asistente'], function () {
      Route::get('/listar', 'AsistenteController@index');
      Route::get('/generar/{post}', 'AsistenteController@generarQR');
      Route::post('/ver_qr', 'AsistenteController@guardarQR');
      Route::get('/ficha/{id}', 'AsistenteController@ficha');
  });

  Route::group(['prefix' => '/Estadistica'], function () {
      Route::get('/','ChartsController@main');
      Route::get('Tarifas','ChartsController@Highchart');
      Route::get('Ventas','ChartsController@LineChart');
      Route::get('Piezas','ChartsController@Chartpieces');
  });
});


Route::middleware(['encmuseo', 'secre'])->group(function () {
  Route::resource('/PruebaBoleto','TestBoletoController');
  Route::resource('boletos','BoletoController');
  Route::resource('rangos','RangoEdadeController');
  Route::resource('visitantes','TipoVisitantesController');
  Route::resource('tarifas','TarifaController');
  Route::get('/find/{param1}{param2}','BoletoController@findtarifa');
  Route::resource('/Pieza','PiezaController');
  Route::resource('/TipoPieza','TipoPiezaController');
  Route::get('/buscarpieza','PiezaController@search');
  Route::resource('/Genero','GeneroController');
  Route::resource('/Categoria','CategoriaController');
  Route::resource('/Adquisiciones','AdquisicioneController');
  Route::resource('/TipoAdquisicion','TipoAdquisicioneController');
  Route::resource('/Asistente','AsistenteController');
  Route::resource('/Donante','DonanteController');
  Route::resource('/Rol','RoleController');
  Route::resource('/PDF','PDF2Controller');
  Route::resource('/FichaInformativa','FichasInformativaController');
  Route::resource('/Boleto','TestBoletoController');
  Route::resource('Evento','EventoController');
  Route::resource('DatoCurioso','DatoscuriosoController');
  Route::get('Random','DatoscuriosoController@ran');
  Route::get('/buscardon','AdquisicioneController@search');
  Route::group(['prefix' => '/asistente'], function () {
      Route::get('/listar', 'AsistenteController@index');
      Route::get('/generar/{post}', 'AsistenteController@generarQR');
      Route::post('/ver_qr', 'AsistenteController@guardarQR');
      Route::get('/ficha/{id}', 'AsistenteController@ficha');
  });

  Route::group(['prefix' => '/Estadistica'], function () {
      Route::get('/','ChartsController@main');
      Route::get('Tarifas','ChartsController@Highchart');
      Route::get('Ventas','ChartsController@LineChart');
      Route::get('Piezas','ChartsController@Chartpieces');
  });

});

Route::middleware(['encbibli'])->group(function () {
  Route::resource('/Libro','LibroController');
  Route::resource('/Editorial','EditorialeController');
  Route::resource('/Autor','AutoreController');
});


Route::group(['prefix' => '/home'], function () {
     Route::get('/','ChartsController@main');
  });

Auth::routes();
