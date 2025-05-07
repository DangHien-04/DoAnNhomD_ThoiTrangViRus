<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductControllerUser extends Controller
{
    public function searchProduct(Request $request)
    {
        $keyword = $request->input('keyword');

        // Kiểm tra nếu không có từ khóa tìm kiếm
        if (!$keyword) {
            return redirect()->back()->with('error', 'Vui lòng nhập từ khóa để tìm kiếm.');
        }

        // Tìm kiếm sản phẩm chỉ theo tên
        $products = Product::where('name_product', 'LIKE', '%' . $keyword . '%')
            ->paginate(12);

        return view('user.searchProduct', [
            'products' => $products,
            'keyword' => $keyword
        ]);
    }
}