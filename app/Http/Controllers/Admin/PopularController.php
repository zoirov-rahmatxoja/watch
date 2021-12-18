<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popular;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PopularController extends Controller
{
   
    public function index()
    {
        $popular = Popular::all();
        return view('admin.popular.index', compact('popular'));
    }

    public function create() {
        $popular = Popular::all();
        return view('admin.popular.create', compact('popular'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'text_1_uz' => ['nullable', 'string'],
            'text_1_ru' => ['nullable', 'string'],
            'text_2_uz' => ['nullable', 'string'],
            'text_2_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $popular = Popular::create($request->all());
            if ($request->image) {
                $this->storeImage($popular);
            }
            return redirect()->route('popular.index');
        }
    }



    public function edit($id)
    {
        $popular = Popular::find($id);
        return view('admin.popular.edit', compact('popular'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'text_1_uz' => ['nullable', 'string'],
            'text_1_ru' => ['nullable', 'string'],
            'text_2_uz' => ['nullable', 'string'],
            'text_2_ru' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $popular = Popular::find($id);
            $popular->update($request->all());
            if ($request->image) {
                $this->storeImage($popular);
            }
        }
        return redirect()->route('popular.index');
    }






    public function destroy($id)
    {
        $popular = Popular::find($id);
        if ($popular->image){
            unlink(public_path() . '/storage/' . $popular->image );
        }
        $popular->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('popular.index');
    }

    

    private function storeImage($popular)
    {
        if (request()->has('image')) {
            $popular->update([
                'image' => \request()->image->store('popular', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $popular->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $popular = $request->upload;
            $popular = $popular->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $popular))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$popular);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}