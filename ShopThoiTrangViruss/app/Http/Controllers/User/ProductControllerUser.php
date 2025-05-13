<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\DB;

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

        // Lấy danh mục và hãng sản xuất để hiển thị trong bộ lọc
        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return view('user.searchProduct', compact('products', 'categories', 'manufacturers', 'keyword'));
    }

    public function filterProduct(Request $request)
    {
        // Lấy tất cả tham số lọc
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $manufacturer = $request->input('manufacturer');
        $price_min = $request->input('price_min');
        $price_max = $request->input('price_max');
        $purchased_min = $request->input('purchased_min');
        $purchased_max = $request->input('purchased_max');
        $sort = $request->input('sort', 'newest'); // Thêm sắp xếp
        
        // Khởi tạo query
        $query = Product::query();
        
        // Tìm kiếm theo keyword nếu có - chỉ tìm theo tên sản phẩm
        if (!empty($keyword)) {
            $query->where('name_product', 'like', '%' . $keyword . '%');
        }
        
        // Lọc theo danh mục
        if (!empty($category)) {
            $query->where('id_category', $category);
        }
        
        // Lọc theo nhà sản xuất
        if (!empty($manufacturer)) {
            $query->where('id_manufacturer', $manufacturer);
        }
        
        // Lọc theo khoảng giá
        if (!empty($price_min)) {
            $query->where('price_product', '>=', $price_min);
        }
        
        if (!empty($price_max)) {
            $query->where('price_product', '<=', $price_max);
        }
        
        // Lọc theo số lượt mua
        if (!empty($purchased_min)) {
            $query->where('purchased', '>=', $purchased_min);
        }
        
        if (!empty($purchased_max)) {
            $query->where('purchased', '<=', $purchased_max);
        }

        // Sắp xếp sản phẩm
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price_product', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price_product', 'desc');
                break;
            case 'purchased':
                $query->orderBy('purchased', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        // Thực hiện truy vấn với phân trang
        $products = $query->paginate(12);
        
        // Lấy danh sách danh mục và nhà sản xuất cho bộ lọc
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        
        return view('user.searchProduct', compact(
            'products', 
            'categories', 
            'manufacturers', 
            'keyword',
            'sort'
        ));
    }
}