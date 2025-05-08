<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Manufacturer;

class ManufacturerController extends Controller
{
    public function indexManufacturer(){
        $manufacturers = Manufacturer::paginate(2);
        return view('admin.manufacturer.listManufacturer', ['manufacturers' => $manufacturers]);
    }    

    public function indexAddManufacturer(){
        return view('admin.manufacturer.addmanufacturer');
    }
    
    public function addManufacturer(Request $request){
        $request->validate([
            'name_manufacturer' => 'required',
            'image_manufacturer' => 'required'
        ]);

        $data = $request->all();

        if($request->hasFile('image_manufacturer'))
        {
            $file = $request->file('image_manufacturer');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            $filename = time().'.'.$ex;
            $file->move('uploads/manufacturerimage/',$filename);
            $data['image_manufacturer'] = $filename;

        }

        Manufacturer::create([
            'name_manufacturer' => $data['name_manufacturer'],
            'image_manufacturer' => $data['image_manufacturer'], 
        ]);
        return redirect()->route('manufacturer.listmanufacturer');
    }

    public function deleteManufacturer(Request $request){
        $manufacturer_id = $request->get('id');
        $manufacturer = Manufacturer::destroy($manufacturer_id);

        return redirect()->route('manufacturer.listmanufacturer');
    }
    
    public function indexUpdateManufacturer(Request $request){
        $manufacturer_id = $request->get('id');
        $manufacturer = Manufacturer::where('id_manufacturer',$manufacturer_id)->first();
        return view('admin.manufacturer.updatemanufacturer', ['manufacturer' => $manufacturer]);
    }


    public function updateManufacturer(Request $request)
    {
        $input = $request->all();
        $manufacturer_id = $input['id'];
        $manufacturer = Manufacturer::where('id_manufacturer',$manufacturer_id)->first();
        $manufacturer->name_manufacturer = $input['name_manufacturer'];
        if($request->hasFile('image_manufacturer'))
        {
            //Xoa ảnh cũ
            $image_cu = 'uploads/manufacturerimage/' . $manufacturer->image;
            if(File::exists($image_cu))
            {
                File::delete($image_cu);
            }
            //xử lý ảnh mới
            $file = $request->file('image_manufacturer');
            $ex = $file->getClientOriginalExtension(); //Lay phan mo rong .jpn,....
            $filename = time().'.'.$ex;
            $file->move('uploads/manufacturerimage/',$filename);
            $manufacturer['image_manufacturer'] = $filename;
        }
        
        $manufacturer->save();
        return redirect()->route('manufacturer.listmanufacturer');
    }
}