<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function indexCard()
    {
        $user_id = session('cart')['user_id'];
        $product = DB::table('products')
        ->join('carts', 'products.id_product', '=', 'carts.id_product')
        ->where('carts.id_user', "=", $user_id)
        ->get();

        $totalAll = 0;
        
        foreach ($product as $item) {
            $totalAll += $item->total_cart;
        }
        
        return view('user.cart', ['product' => $product, 'totalAll' => $totalAll]);
    }

    public function addCart(Request $request)
    {
        // $data = $request->all();
        // $product = Product::where('id_product', $data['id_product'])->first();
        // $total_card = $data['quantity_card'] * $product->price_product;
        // Cart::create([
        //     'id_user' => session('cart')['user_id'],
        //     'id_product' => $product->id_product,
        //     'quantity_product' => $data['quantity_card'],
        //     'total_cart' => $total_card,
        // ]);


        $data = $request->all();
        $product = Product::where('id_product', $data['id_product'])->first();
        $total_cart = $data['quantity_cart'] * $product->price_product;
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $carts = Cart::where('id_user', session('cart')['user_id'])
            ->where('id_product', $product->id_product)
            ->first();
        if ($carts) {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng và tổng giá
            $carts->quantity_product += $data['quantity_cart'];
            $carts->total_cart += $total_cart;
            $carts->save();
        } else {
            // Nếu sản phẩm chưa có trong giỏ hàng, tạo một mục giỏ hàng mới
            Cart::create([
                'id_user' => session('cart')['user_id'],
                'id_product' => $product->id_product,
                'quantity_product' => $data['quantity_cart'],
                'total_cart' => $total_cart,
            ]);
        }
        return redirect()->route('home.index');
    }


    public function deleteProductCart(Request $request)
    {
        $productId = $request->get('id');
        $user_id = session('cart')['user_id'];
        Cart::where('id_user', $user_id)
            ->where('id_product', $productId)
            ->delete();
        return redirect()->back();
    }

    public function indexCheckout(){
        return view('user.');
    }
}