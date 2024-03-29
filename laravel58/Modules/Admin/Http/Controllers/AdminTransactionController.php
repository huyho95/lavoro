<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $transactions = Transaction::with('user:id,name')->paginate(10);

        $viewData = [
            'transactions' => $transactions,
        ];
        return view('admin::transaction.index', $viewData);
    }

    public function viewOrder(Request $request, $id)
    {
        if ($request->ajax()) {
            $orders = Order::with('product')->where('or_transaction_id', $id)->get();

            $html = view('admin::components.order', compact('orders'))->render();
            return \response()->json($html);
        }
    }

    /**
     * Xử lý trạng thái đơn hàng
     */
    public function actionTransaction($id)
    {
        $transaction = Transaction::find($id);
        $orders = Order::where('or_transaction_id', $id)->get();

        if ($orders) {
            //tru di so luong san pham
            //tang bien san pham
            foreach ($orders as $order) {
                $product = Product::find($order->or_product_id);
                $product->pro_number = $product->pro_number - $product->or_qty;
                $product->pro_pay++;
                $product->save();
            }
        }

        // update user
        \DB::table('users')->where('id', $transaction->tr_user_id)->increment('total_pay');

        $transaction->tr_status = Transaction::STATUS_DONE;
        $transaction->save();

        return redirect()->back()->with('success', 'Xử lý đơn hàng thành công');
    }

    public function action($action, $id)
    {
        if ($action) {
            $messages = '';
            $transaction = Transaction::find($id);
            switch ($action) {
                case 'delete':
                    $transaction->delete();
                    $messages = 'Xóa dữ liệu thành công';
                    break;

            }
        }

        return redirect()->back()->with('success', $messages);

    }
}
