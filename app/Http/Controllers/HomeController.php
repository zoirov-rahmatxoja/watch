<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Client;
use App\Models\Faqs;
use App\Models\Feat;
use App\Models\Future;
use App\Models\Info;
use App\Models\Popular;
use App\Models\Product;
use App\Models\Services;
use App\Models\Start;
use App\Models\Video;
use App\Models\Watch;
use Illuminate\Http\Request;



use Telegram\Bot\Laravel\Facades\Telegram;



class HomeController extends Controller
{
    public function index()
    {

        $start = Start::all();
        $watch = Watch::all();
        $future = Future::all();
        $about = About::all();
        $video = Video::all();
        $product = Product::all();
        $services = Services::all();
        $popular = Popular::all();
        $client = Client::all();
        $feat = Feat::all();
        $faqs = Faqs::all();
        $info = Info::all();
        return view('site.index',compact('start','watch','future','about','video','product','services','popular','client','feat','faqs','info'));
    }




public function sendToTg(Request $request) {
    $this->validate($request, ['phone' => 'required|min:8']);

       Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001743459400'),
        'parse_mode' => 'HTML',
        'text' => "<b>Новая обращение!</b>\n"
            . "\n"
            . "<b>Имя клиента</b>: $request->name\n"
            . "<b>Тел номер</b>: $request->email\n"
            . "<b>Категория</b>: $request->subject\n"
            . "<b>Сообщение</b>: $request->message\n"
    ]);
    // Alert::success('Обращение принято', 'Скоро мы свяжемся с вами');
    return redirect()->back();





}



}
