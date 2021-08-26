<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/cliente', 'Cpark::index',['filter' => 'ver']);
$routes->get('/publi','Home::publicos');
$routes->post('/validar','Home::validar');
$routes->get('/esta','Home::oesta',['filter' => 'auth']);
#$routes->get('/delete/(:num)','Ccontact::deletecontact/$1');
$routes->get('/vehiculo', 'Cpark::vehi',['filter' => 'ver']);
$routes->get('/factura', 'Cpark::factu',['filter' => 'ver']);
$routes->get('/tarifa', 'Cpark::tari',['filter' => 'ver']);
$routes->get('/parking', 'Cpark::registro');
$routes->get('/login', 'Cpark::login');
$routes->get('/regi', 'Cpark::regi');
$routes->post('/singup', 'Cpark::singup');
$routes->get('/recu', 'Cpark::recu');
$routes->post('/veri','Cpark::veri');
$routes->post('/send','Cpark::send');
$routes->get('/log','Cpark::logeado',['filter' => 'ver']);
$routes->post('/crearclientes','Cclientes::guardarc');
$routes->post('/ocupar','Home::ocu',['filter' => 'auth']);
$routes->post('/crearvehiculo','Cvehi::guardarv');
$routes->post('/crearfactura','Cfactura::guardarf');
$routes->post('/creartarifa','Ctar::guardarT');
$routes->get('/clisa','Ccontact::moslistas');
$routes->get('/edit/(:num)','Ccontact::editcontact/$1');
$routes->get('/updatecontact','Ccontact::updatecontact');
$routes->get('/delete','Ccontact::deletecontact/$1');
$routes->get('/veisa','Cvehi::index');
$routes->get('/editv/(:num)','Cvehi::editcontact/$1');
$routes->post('/updatevehi','Cvehi::updatecontact');
$routes->get('/deletev','Cvehi::deletecontact/$1');
$routes->get('/salir', 'Home::salir');
$routes->get('/salir2', 'Home::salir2');
#$routes->get('/faisa','Cfactura::index');
#$routes->get('/taisa','Ctar::index');
#$routes->get('/editf/(:num)','Cfactura::editcontact/$1');
#$routes->post('/updatefac','Cfactura::updatecontact');
#$routes->get('/deletef/(:num)','Cfactura::deletecontact/$1');
#$routes->get('/documento','Documento::index');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
