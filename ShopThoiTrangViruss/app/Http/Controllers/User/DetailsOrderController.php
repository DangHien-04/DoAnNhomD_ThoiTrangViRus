<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailsOrder;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DetailsOrderController extends Controller
{
    public function addDetailsOrder(Request $request)
    {
        $data = $request->all();
        $address = $data['address'];
        $total = $data['total'];

        $user_id = session('cart')['user_id'];
        $cart = DB::table('carts')
        ->where('carts.id_user', "=", $user_id)
        ->get();

        $id_order = DB::table('order')
        ->where('id_user', $user_id)
        ->latest()
        ->value('id_order');       

        foreach($cart as $value)
        {
            $detailOrder = DetailsOrder::create([
                'id_order' => $id_order,
                'id_product' => $value->id_product,
                'quantity_detailsorder' => $value->quantity_product,
            ]);
        }

        $order = Order::where('id_order', $id_order)->first();
        $order->address = $address;
        $order->total_order = $total;
        $order->save();

        Cart::where('id_user', $user_id)->delete();

        return redirect()->route('home.index');
    }

    public function detailsOrderIndex(Request $request)
    {
        $id_order = $request->get('id_order');

        $order = DB::table('products')
        ->join('detailsorder', 'products.id_product', "=", 'detailsorder.id_product')
        ->join('order', 'detailsorder.id_order', "=", 'order.id_order')
        ->where('order.id_order', "=", $id_order)
        ->get();

        return view('user.mydeatilorder', ['order' => $order]);
    }
}
