<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->get('/', function(){
    // return (["data" => "Welcome to the Stoke Motors Api"]);
    return view('welcome');
});

$router->get('/sales', 'SalesController@listRevenue');


$router->group(['prefix' => 'vehicles'], static function () use ($router) {
    $router->get('/', 'VehicleController@listVehicles');
    $router->post('/update/{vehicleId}', 'VehicleController@update');
    $router->post('/create', 'VehicleController@create');
    $router->delete('/delete/{vehicleId}', 'VehicleController@delete');

    $router->get('/makes', 'VehicleController@listMakes');
    $router->get('/makes/{makeId}/models', 'VehicleController@listModels');
    $router->get('/models/{modelId}/editions', 'VehicleController@listEditions');

    $router->get('/info/{vehicleId}', 'VehicleController@vehicleDetails');

    $router->get('/images/{vehicleId}', 'VehicleImageController@listImages');
    $router->post('/images/{vehicleId}/create', 'VehicleImageController@create');

});

$router->group(['prefix' => 'customers'], static function () use ($router) {
    $router->get('/', 'CustomerController@listCustomers');
    $router->post('/create', 'CustomerController@create');
    $router->post('/update/{customerId}', 'CustomerController@update');
});

$router->group(['prefix' => 'enquiries'], static function () use ($router) {
    $router->get('/', 'EnquiryController@listEnquiries');
    $router->get('/messages', 'EnquiryController@getMessages');
    $router->put('/{enquiryId}/sold', 'EnquiryController@vehicleSold');
    $router->post('/create', 'EnquiryController@create');
    $router->post('/update/{enquiryId}', 'EnquiryController@update');
    $router->delete('/delete/{enquiryId}', 'EnquiryController@delete');
});
