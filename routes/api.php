use App\Http\Controllers\Api\PaymentApiController;
use Illuminate\Support\Facades\Route;

Route::post('/v1/create-payment', [PaymentApiController::class, 'create']);
Route::post('/v1/verify-payment', [PaymentApiController::class, 'verify']);
