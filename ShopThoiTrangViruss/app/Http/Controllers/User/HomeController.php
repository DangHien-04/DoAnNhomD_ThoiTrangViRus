<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;

class HomeController extends Controller
{

    public function indexHome()
    {

        $product = Product::paginate(6);
        $get6newproduct = Product::orderBy('created_at', 'desc')->take(6)->get();
        $category = Category::all();
        $manufacturer = Manufacturer::all();
        $productsWithCategorys = Product::select('products.*', 'categories.name_category')

            ->leftJoin('categories', 'products.id_category', '=', 'categories.id_category')
            ->get();
        $productsWithManufacturers = Product::select('products.*', 'manufacturers.name_manufacturer')
            ->leftJoin('manufacturers', 'products.id_manufacturer', '=', 'manufacturers.id_manufacturer')
            ->get();
        return view('user.home', [
            'products' => $product,

            'get6newproducts' => $get6newproduct,
            'categorys' => $category,
            'manufacturers' => $manufacturer,
            'productsWithCategorys' => $productsWithCategorys,

            'productsWithManufacturers' => $productsWithManufacturers
        ]);
    }

    public function indexDetailProduct(Request $request)
    {
        $product_id = $request->get('id');
        $product = Product::where('id_product', $product_id)->first();
        $specification = $product->specifications;
        $specificationArray = explode(';', $specification);

        // Lấy danh sách màu sắc và kích thước từ cột `colors` và `sizes`
        $colors = explode(',', $product->colors);
        $sizes = explode(',', $product->sizes);

        // Lấy thông tin hãng sản xuất
        $manufacturer = Manufacturer::where('id_manufacturer', $product->id_manufacturer)->first();

        return view('user.detailproduct', [
            'specifications' => $specificationArray,
            'product' => $product,
            'colors' => $colors,
            'sizes' => $sizes,
            'manufacturer' => $manufacturer
        ]);
    }

    public function showProductDetail($id)
    {
        $product = Product::find($id);

        // Lấy danh sách màu sắc và kích thước từ cột `colors` và `sizes`
        $colors = explode(',', $product->colors);
        $sizes = explode(',', $product->sizes);
        $specifications = explode(';', $product->specifications);

        return view('user.detailproduct', compact('product', 'colors', 'sizes', 'specifications'));
    }

}