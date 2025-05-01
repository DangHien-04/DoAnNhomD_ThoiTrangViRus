<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\DetailsOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function orderindexAdmin()
    {
        $order = Order::paginate(2);
        return view('admin.order.orderindex', ['order' => $order]);
    }

    public function adminDetailsOrderIndex(Request $request)
    {
        $id_order = $request->get('id_order');

        $order = DB::table('products')
        ->join('detailsorder', 'products.id_product', "=", 'detailsorder.id_product')
        ->join('order', 'detailsorder.id_order', "=", 'order.id_order')
        ->where('order.id_order', "=", $id_order)
        ->get();

        return view('admin.order.detailorder', ['order' => $order]);
    }

    public function admindetailsorderdelete(Request $request)
    {
        $id_order = $request->get('id_order');

        DetailsOrder::where('id_order', $id_order)->delete();
        Order::where('id_order', $id_order)->delete();  

        
        return redirect()->route('admin.orderindexAdmin');
    }

    public function adminSearchOrder(Request $request)
    {
        $data = $request->all();
        $search = $data['id'];
        $orders = Order::where('id_order', $search)
        ->orWhere('id_user', $search)->get();
        return view('admin.order.findorder', ['orders' => $orders]);
    }
}
