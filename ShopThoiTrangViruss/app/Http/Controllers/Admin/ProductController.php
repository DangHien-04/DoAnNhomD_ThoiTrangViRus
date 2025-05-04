<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    public function indexProduct() {
        $products = Product::paginate(2);
        $category = Category::all();
        $manufacturer = Manufacturer::all();
        return view('admin.product.listproduct', [
            'products' => $products,
            'categorys' => $category,
            'manufacturers' => $manufacturer,
        ]);
    }    

    public function indexAddProduct(){
        $category = Category::all();
        $manufacturer = Manufacturer::all();
        return view('admin.product.addproduct', [
            'categorys' => $category,
            'manufacturers' => $manufacturer
        ]);
    }
    
    public function addProduct(Request $request){

        $request->validate([
            'selected_category' => 'required',
            'selected_manufacturer' => 'required',
            'name_product' => 'required',
            'quantity_product' => 'required',
            'price_product' => 'required',
            'image_address_product' => 'required',
            'describe_product' => 'required',
            'specifications' => 'required',
            // Sizes and colors are optional, so no validation rules here
        ]);

        $data = $request->all();

        if($request->hasFile('image_address_product'))
        {
            $file = $request->file('image_address_product');
            $ex = $file->getClientOriginalExtension(); // Lay phan mo rong .jpg,...
            $filename = time().'.'.$ex;
            $file->move('uploads/productimage/',$filename);
            $data['image_address_product'] = $filename;
        }

        Product::create([
            'id_category' => $data['selected_category'],
            'id_manufacturer' => $data['selected_manufacturer'], 
            'name_product' => $data['name_product'],
            'quantity_product' => $data['quantity_product'], 
            'price_product' => $data['price_product'],
            'image_address_product' => $data['image_address_product'], 
            'describe_product' => $data['describe_product'],
            'specifications' => $data['specifications'],
            'sizes' => $data['sizes'] ?? null, // Add the sizes field
            'colors' => $data['colors'] ?? null, // Add the colors field
        ]);
        
        return redirect()->route('product.listproduct');
    }

    public function deleteProduct(Request $request){
        $product_id = $request->get('id');
        $product = Product::destroy($product_id);
        return redirect()->route('product.listproduct');
    }

    public function indexUpdateProduct(Request $request){
        $product_id = $request->get('id');
        $product = Product::where('id_product',$product_id)->first();
        $category = Category::all();
        $manufacturer = Manufacturer::all();
        return view('admin.product.updateproduct', [
            'products' => $product,
            'categorys' => $category,
            'manufacturers' => $manufacturer
        ]);
    }
    
    public function updateProduct(Request $request){
        $input = $request->all();
        $id_product = $input['id'];
        $product = Product::where('id_product', $id_product)->first();
        $id_category = $request->input('selected_category');
        $id_manufacturer = $request->input('selected_manufacturer');
        $product->id_category = $id_category;
        $product->id_manufacturer = $id_manufacturer;
        $product->name_product = $input['name_product'];
        $product->quantity_product = $input['quantity_product'];
        $product->price_product = $input['price_product'];
        $product->describe_product = $input['describe_product'];
        $product->specifications = $input['specifications'];
        $product->sizes = $input['sizes'] ?? $product->sizes; // Update sizes if provided
        $product->colors = $input['colors'] ?? $product->colors; // Update colors if provided
        
        if($request->hasFile('image_address_product'))
        {
            //Xoa ảnh cũ
            $image_cu = 'uploads/productimage/' . $product->image_address_product;
            if(File::exists($image_cu))
            {
                File::delete($image_cu);
            }
            //xử lý ảnh mới
            $file = $request->file('image_address_product');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpg,...
            $filename = time().'.'.$ex;
            $file->move('uploads/productimage/',$filename);
            $input['image_address_product'] = $filename;
            $product->image_address_product = $input['image_address_product'];     
        }   
        $product->save();
        return redirect()->route('product.listproduct');
    }
}