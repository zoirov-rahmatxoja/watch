<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        
        $info = Info::all();
        return view('admin.info.index',compact('info'));
    }


    public function create()
    {
        $info = Info::all();
        return view('admin.info.create',compact('info'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'email'  => ['nullable', 'string'],
            'phone'  => ['nullable', 'string'],
            'address'  => ['nullable', 'string'],
            
            
        ]);
            if ($valid) {
                $info =Info::create($request->all());
                return redirect()->route('info.index');
            }
    }

        
    public function edit($id)
    {
        $info =Info::find($id);
        return view('admin.info.edit', compact('info'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'email'  => ['nullable', 'string'],
            'phone'  => ['nullable', 'string'],
            'address'  => ['nullable', 'string'],
           
        ]);
            if ($valid) {
                $info =Info::find($id);
                $info->update($request->all());
               
            }
            return redirect()->route('info.index');
    }


    public function destroy($id)
    {
        $info =Info::find($id);
        
        $info->delete();
        // Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('info.index');
    
    }
}