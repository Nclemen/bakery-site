    <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpeningHoursController;
use App\Http\Resources\OpeningHoursResource;
use App\Models\OpeningHours;
use Carbon\Carbon;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('opening-hours', OpeningHoursController::class);

Route::get('test/{date}', function ($date) {
    return OpeningHours::whereBetween('start_time',[$date, $date . ' 23:59:59'])->get();
})->name('api.test');
