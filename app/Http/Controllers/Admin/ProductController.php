<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function create() {
        $product =   Product::all();
        return view('admin.product.create', compact('product'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            
            'cost' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
           
           
        ]);
        if ($valid) {
            $product =   Product::create($request->all());
            if ($request->image) {
                $this->storeImage($product);
            }
            return redirect()->route('product.index');
        }
    }



    public function edit($id)
    {
        $product =   Product::find($id);
        return view('admin.product.edit', compact('product'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
             
            'cost' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
           
            
        ]);


        if ($valid) {
            $product =  product::find($id);
            $product->update($request->all());
            if ($request->image) {
                $this->storeImage($product);
            }
        }
        return redirect()->route('product.index');
    }






    public function destroy($id)
    {
        $product =   Product::find($id);
        if ($product->image){
            unlink(public_path() . '/storage/' . $product->image );
        }
        $product->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('product.index');
    }

    

    private function storeImage($product)
    {
        if (request()->has('image')) {
            $product->update([
                'image' => \request()->image->store('product', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $product->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $product = $request->upload;
            $product = $product->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $product))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$product);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
