<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobOffer;
use App\Models\Postulation;
use Illuminate\Http\Request;

use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobOfferController;
use App\Http\Controllers\PostulationController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/test', function () {
// 	return \Request::ip();
// 	$arr_ip = geoip()->getLocation(\Request::ip());
//     return $arr_ip->country;
//     // return response()->json([$arr_ip]);
// });

Route::get('/information', function () {
	return view('information');
});


Route::get('/search/{search}/{city}', function ($search,$city) {

	$search = str_replace("-"," ",$search);
	$city = str_replace("-"," ",$city);

	$arr_ip = geoip()->getLocation(\Request::ip());
	$country = $arr_ip->country;

	if ($city == 'anywhere') {
		$jobs = JobOffer::where('title', 'like', '%'.$search.'%')->orWhere('keywords', 'like', '%'.$search.'%')
        ->orderBy('title')
        ->paginate(20);
	} else {
		$jobs = JobOffer::where('title', 'like', '%'.$search.'%')->where('city', 'like', '%'.$city.'%')->orWhere('keywords', 'like', '%'.$search.'%')
        ->orderBy('title')
        ->paginate(20);
	}
	

	


   	
   	// if ($jobs == null) {
   	// $jobs = json_encode(array('null'));
   	// }else{
   	$jobs = json_encode(array($jobs));
   	// }

	return view('search',[
		'country' => $country,
		'jobs' => $jobs,
		'search' => str_replace(" ","-",$search),
		'city' => str_replace("-"," ",$city)
	]);
});


Route::post('/search/job',[HomeController::class, 'searchjob']);
Route::post('/search/city',[HomeController::class, 'searchcity']);
Route::post('/uploadresumecustomer',[PostulationController::class, 'store']);


Route::group(['middleware' => 'auth'], function()
{
   
	Route::post('/uploadresume',[UserController::class, 'uploadresume']);
	Route::post('/edituser',[UserController::class, 'edit']);
	Route::post('/storeoffer',[JobOfferController::class, 'store']);
	Route::post('/deletepost/{id}',[JobOfferController::class, 'destroy']);
	Route::post('/deleteapp/{id}',[PostulationController::class, 'destroy']);

	// Route::get('/account', function () {
	// 	$user = User::where('id',Auth::id())->get();
	//     return view('account',[
	//     	'user' => $user
	//     ]);
	// });

	Route::get('/hiring', function () {
		$companyname = User::where('id',Auth::id())->value('name');
	    return view('hiring',[
	    	'companyname' => $companyname
	    ]);
	});

	Route::get('/mypost', function () {

		$post = JobOffer::where('id_owner',Auth::id())->orderByDesc('id')->get();

	    return view('mypost', [
	    	'post' => $post
	    ]);
	});

	Route::get('/applications', function () {

		$application = Postulation::where('id_owner',Auth::id())->orderByDesc('id')->get();
		$myjobpost = JobOffer::where('id_owner',Auth::id())->get();

		return view('application', [
	    	'application' => $application,
	    	'myjobpost' => $myjobpost
	    ]);

	});


});



// Route::post('/uploadresume','ResumeController@store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
