<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompaniesWithCategoriesController;
use App\Http\Controllers\Roster_daysController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Roster_baseController;
use App\Http\Controllers\AvailableTimesController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\PlanningController;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

    
Route::apiResource('companies', CompaniesController::class)
    ->middleware('auth:sanctum');


Route::get('companiesWithCategories', [CompaniesController::class, 'companies_with_categories']);
Route::get('rosterDays', [Roster_daysController::class, 'index'])
    ->middleware('auth:sanctum');




Route::group(['middleware' => ['auth:sanctum']], function() {

    // AUTH
    Route::get('user', [AuthController::class, 'authToken']);
    Route::get('logout', [AuthController::class, 'logout']);


    Route::post('roster_baseByUser', [Roster_baseController::class, 'getRoster_baseByUser']);
    Route::post('getAvailableTimesbyUser', [AvailableTimesController::class, 'getAvailableTimesbyUser']);

    

    Route::group(['middleware' => ['isOwner']], function() {
    });


    Route::group(['middleware' => ['isAdmin']], function() {
        Route::post('createAvailableTimes', [AvailableTimesController::class, 'createAvailableTimes']);
        Route::post('createAvailableTimes2', [AvailableTimesController::class, 'createAvailableTimes2']);

        // GET EMPLOYEES
        Route::get('getEmployees', [UserController::class, 'getEmployees']);
        
        // GET WEEK DAYS
        Route::get('getNextWeek', [DateController::class, 'getNextWeek']);
        Route::get('getNext2ndWeek', [DateController::class, 'getNext2ndWeek']);
        Route::get('getNext3rdWeek', [DateController::class, 'getNext3rdWeek']);

        // PLANNING
        Route::post('createPlanningNextWeek', [PlanningController::class, 'createPlanningNextWeek']);

        
    });

    
    Route::group(['middleware' => ['isEmployee']], function() {

    });
    






});
