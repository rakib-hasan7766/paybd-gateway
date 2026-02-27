namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;

class PaymentApiController extends Controller {
    public function create(Request $request) {
        $merchant = User::where('api_key', $request->api_key)->first();
        if (!$merchant) return response()->json(['status' => 'error', 'msg' => 'Invalid API Key']);

        $trx = Transaction::create([
            'user_id' => $merchant->id,
            'trx_id' => 'PYBD' . strtoupper(uniqid()),
            'amount' => $request->amount,
            'status' => 'pending'
        ]);

        return response()->json([
            'status' => 'success',
            'payment_url' => url('/checkout/' . $trx->trx_id)
        ]);
    }
}
