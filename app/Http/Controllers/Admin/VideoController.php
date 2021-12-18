<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        
        $video = Video::all();
        return view('admin.video.index',compact('video'));
    }


    public function create()
    {
        $video = Video::all();
        return view('admin.video.create',compact('video'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'link'  => ['nullable', 'string'],
            
        ]);
            if ($valid) {
                $video =Video::create($request->all());
                return redirect()->route('video.index');
            }
    }

        
    public function edit($id)
    {
        $video =Video::find($id);
        return view('admin.video.edit', compact('video'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
            'link'  => ['nullable', 'string'],
          
           
        ]);
            if ($valid) {
                $video =Video::find($id);
                $video->update($request->all());
               
            }
            return redirect()->route('video.index');
    }


    public function destroy($id)
    {
        $video =Video::find($id);
        
        $video->delete();
        // Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('video.index');
    
    }
}