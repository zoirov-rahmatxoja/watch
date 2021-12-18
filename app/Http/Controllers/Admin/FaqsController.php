<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class FaqsController extends Controller
{
   
    public function index()
    {
        $faqs = Faqs::all();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create() {
        $faqs = Faqs::all();
        return view('admin.faqs.create', compact('faqs'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            
            'title_uz' => ['nullable', 'string'],
            'title_ru' => ['nullable', 'string'],
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $faqs = Faqs::create($request->all());
            if ($request->image) {
                $this->storeImage($faqs);
            }
            return redirect()->route('faqs.index');
        }
    }



    public function edit($id)
    {
        $faqs = Faqs::find($id);
        return view('admin.faqs.edit', compact('faqs'));
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
            $faqs = Faqs::find($id);
            $faqs->update($request->all());
            if ($request->image) {
                $this->storeImage($faqs);
            }
        }
        return redirect()->route('faqs.index');
    }






    public function destroy($id)
    {
        $faqs = Faqs::find($id);
        if ($faqs->image){
            unlink(public_path() . '/storage/' . $faqs->image );
        }
        $faqs->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('faqs.index');
    }

    

    private function storeImage($faqs)
    {
        if (request()->has('image')) {
            $faqs->update([
                'image' => \request()->image->store('faqs', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $faqs->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $faqs = $request->upload;
            $faqs = $faqs->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $faqs))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$faqs);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}