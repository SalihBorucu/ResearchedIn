<?php

use Illuminate\Support\Facades\Route;
use duncan3dc\Laravel\Dusk;
use App\User;

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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Ajax
Route::post('/store', 'Ajax\LinkedinDetailsController@store');
Route::post('/delete', 'Ajax\LinkedinDetailsController@delete');
Route::post('/store-links', 'Ajax\LinksController@store');

Route::get('test', function(){
    $dusk = new Dusk;
    $linkedInUsername = "uchikanda@hotmail.com";
    $linkedInPassword = "adminpassword12";

    $dusk->visit('https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin')
            ->type('session_key', $linkedInUsername)
            ->type('session_password', $linkedInPassword)
            ->click('button[data-control-urn="login-submit"]')
            ->pause(3000)
            ->visit('https://www.linkedin.com/in/bertug-korucu/');
    
    $company = $dusk->element(".pv-entity__secondary-title.t-14.t-black.t-normal")->getText();
    $country = $dusk->element(".t-16.t-black.t-normal.inline-block")->getText();
    $name = $dusk->element(".inline.t-24.t-black.t-normal.break-words")->getText();
    $nameArr = explode(" ",$name);
    $firstName = array_shift($nameArr);
    $secondName = implode($nameArr);
    $title = $dusk->element("h3[class='t-16 t-black t-bold']")->getText();

    if($dusk->element(".pv-entity__location.t-14 t-black--light.t-normal block")){
        $city = $dusk->element(".pv-entity__location.t-14 t-black--light.t-normal block")->getText();
        }else{
            $city = null;
        }

    // $prospect = [$company, $country, $name, $title, $firstName, $secondName, $city];
  $prospect = (object) [
    'company' => $company,
    'firstName' => $firstName,
    'secondName' => $secondName,
    'country' => $country,
    'title' => $title,
    'city' => $city
  ];
// $dusk->screenshot(storage_path('app/bla'));

dd($prospect);
// ->getText();
});