<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class aboutController extends Controller
{
    public function index()
    {
        
        $about = About::all();
        return view('admin.about.index',compact('about'));
    }


    public function create()
    {
        $about = About::all();
        return view('admin.about.create',compact('about'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'text_uz'  => ['nullable', 'string'],
            'text_ru'  => ['nullable', 'string'],
            
            
        ]);
            if ($valid) {
                $about =About::create($request->all());
                return redirect()->route('about.index');
            }
    }

        
    public function edit($id)
    {
        $about =About::find($id);
        return view('admin.about.edit', compact('about'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
            'text_uz'  => ['nullable', 'string'],
            'text_ru'  => ['nullable', 'string'],
           
        ]);
            if ($valid) {
                $about =About::find($id);
                $about->update($request->all());
               
            }
            return redirect()->route('about.index');
    }


    public function destroy($id)
    {
        $about =About::find($id);
        
        $about->delete();
        // Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('about.index');
    
    }
}