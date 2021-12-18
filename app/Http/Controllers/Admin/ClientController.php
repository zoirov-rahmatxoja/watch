<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::all();
        return view('admin.client.index', compact('client'));
    }

    public function create() {
        $client =  Client::all();
        return view('admin.client.create', compact('client'));
    }



    public function store(Request $request) {
        $valid = $request->validate([   
            
            'name' => ['nullable', 'string'],
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $client =  Client::create($request->all());
            if ($request->image) {
                $this->storeImage($client);
            }
            return redirect()->route('client.index');
        }
    }



    public function edit($id)
    {
        $client =  Client::find($id);
        return view('admin.client.edit', compact('client'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            
            'name' => ['nullable', 'string'],
           
            'text_uz' => ['nullable', 'string'],
            'text_ru' => ['nullable', 'string'],
            'company' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $client =  Client::find($id);
            $client->update($request->all());
            if ($request->image) {
                $this->storeImage($client);
            }
        }
        return redirect()->route('client.index');
    }






    public function destroy($id)
    {
        $client =  Client::find($id);
        if ($client->image){
            unlink(public_path() . '/storage/' . $client->image );
        }
        $client->delete();
        // Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('client.index');
    }

    

    private function storeImage($client)
    {
        if (request()->has('image')) {
            $client->update([
                'image' => \request()->image->store('client', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $client->image));
        $image->save();
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $client = $request->upload;
            $client = $client->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $client))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$client);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

}