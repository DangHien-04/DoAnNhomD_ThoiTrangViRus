<?php 
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;

class ManufacturerControllerUser extends Controller
{
    public function indexmanufacture()
    {
        $manufacturers = Manufacturer::all();
        return view('user.manufacturer', compact('manufacturers'));
    }
}
