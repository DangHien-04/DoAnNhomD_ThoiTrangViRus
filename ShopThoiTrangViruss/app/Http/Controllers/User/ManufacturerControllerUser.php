<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Product;

class ManufacturerControllerUser extends Controller
{
    public function indexmanufacture()
    {
        $manufacturers = Manufacturer::all();
        return view('user.manufacturer', compact('manufacturers'));
    }

    public function showProductsByManufacturer($id)
    {
        $manufacturer = Manufacturer::findOrFail($id);
        $products = Product::where('id_manufacturer', $id)->paginate(12);

        return view('user.products_by_manufacturer', [
            'manufacturer' => $manufacturer,
            'products' => $products
        ]);
    }
}
