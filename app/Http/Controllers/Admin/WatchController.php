<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Watch;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function index()
    {
        $watch = Watch::all();
        return view('admin.watch.index', compact('watch'));
    }

    public function create() {
        $watch =  Watch::all();
        return view('admin.watch.create', compact('watch'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $watch =  Watch::create($request->all());
            if ($request->image) {
                $this->storeImage($watch);
            }
            return redirect()->route('watch.index');
        }
    }



    public function edit($id)
    {
        $watch =  Watch::find($id);
        return view('admin.watch.edit', compact('watch'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $watch =  Watch::find($id);
            $watch->update($request->all());
            if ($request->image) {
                $this->storeImage($watch);
            }
        }
        return redirect()->route('watch.index');
    }






    public function destroy($id)
    {
        $watch =  Watch::find($id);
        if ($watch->image){
            unlink(public_path() . '/storage/' . $watch->image );
        }
        $watch->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('watch.index');
    }

    

    private function storeImage($watch)
    {
        if (request()->has('image')) {
            $watch->update([
                'image' => \request()->image->store('watch', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $watch->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $watch = $request->upload;
            $watch = $watch->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $watch))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$watch);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}
