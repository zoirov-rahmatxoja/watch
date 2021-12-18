<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feat;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FeatController extends Controller
{
    public function index()
    {
        $feat = Feat::all();
        return view('admin.feat.index', compact('feat'));
    }

    public function create() {
        $feat = Feat::all();
        return view('admin.feat.create', compact('feat'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $feat = Feat::create($request->all());
            if ($request->image) {
                $this->storeImage($feat);
            }
            return redirect()->route('feat.index');
        }
    }



    public function edit($id)
    {
        $feat = Feat::find($id);
        return view('admin.feat.edit', compact('feat'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            'color' => ['nullable', 'string'],
           
            
        ]);


        if ($valid) {
            $feat = Feat::find($id);
            $feat->update($request->all());
            if ($request->image) {
                $this->storeImage($feat);
            }
        }
        return redirect()->route('feat.index');
    }






    public function destroy($id)
    {
        $feat = Feat::find($id);
        if ($feat->image){
            unlink(public_path() . '/storage/' . $feat->image );
        }
        $feat->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('feat.index');
    }

    

    private function storeImage($feat)
    {
        if (request()->has('image')) {
            $feat->update([
                'image' => \request()->image->store('feat', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $feat->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $feat = $request->upload;
            $feat = $feat->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $feat))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$feat);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}