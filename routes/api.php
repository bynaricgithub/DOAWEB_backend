<?php

use App\Http\Controllers\CircularController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ImpLinksController;
use App\Http\Controllers\LatestUpdateController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\OfficersController;
use App\Http\Controllers\GovCouncilController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\EventVidController;
use App\Http\Controllers\HomemenuController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\RegionalOfficeController;

Route::get('/latestUpdates', [LatestUpdateController::class, 'index']);
Route::get('/photo', [PhotoController::class, 'index']);
Route::get('/circulars', [CircularController::class, 'index']);
Route::get('/circulars/all', [CircularController::class, 'getAll']);
Route::get('/impLinks', [ImpLinksController::class, 'index']);
Route::get('/events', [EventsController::class, 'index']);
Route::get('/Officers', [OfficersController::class, 'index']);
Route::get('/councils', [GovCouncilController::class, 'index']);
Route::get('/boards', [BoardController::class, 'index']);
Route::get('/EventVideos', [EventVidController::class, 'index']);
Route::get('/homemenu', [HomemenuController::class, 'index']);
Route::post('/visitor', [UserController::class, 'saveVisitorCount']);
Route::get('/visitor/count', [UserController::class, 'getUserVisitCount']);
Route::get('/map', [MapController::class, 'index']);
Route::get('/search', [SearchController::class, 'index']);
Route::get('/lastUpdateDate', [LatestUpdateController::class, 'getLastUpdateDate']);
Route::get('/regional-office', [RegionalOfficeController::class, 'index']);
