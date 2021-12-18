<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Future;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FutereController extends Controller
{
    public function index()
    {
        $future = Future::all();
        return view('admin.future.index', compact('future'));
    }

    public function create() {
        $future =  Future::all();
        return view('admin.future.create', compact('future'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $future =  Future::create($request->all());
            if ($request->image) {
                $this->storeImage($future);
            }
            return redirect()->route('future.index');
        }
    }



    public function edit($id)
    {
        $future =  Future::find($id);
        return view('admin.future.edit', compact('future'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
            
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $future =  Future::find($id);
            $future->update($request->all());
            if ($request->image) {
                $this->storeImage($future);
            }
        }
        return redirect()->route('future.index');
    }






    public function destroy($id)
    {
        $future =  Future::find($id);
        if ($future->image){
            unlink(public_path() . '/storage/' . $future->image );
        }
        $future->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('future.index');
    }

    

    private function storeImage($future)
    {
        if (request()->has('image')) {
            $future->update([
                'image' => \request()->image->store('future', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $future->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $future = $request->upload;
            $future = $future->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $future))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$future);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
