<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\models\Contact;

//いろいろと変数を一致點せなkればいけない。コードをトレースし直して、変数やデータ型を訂正していく。

class ContactsController extends Controller
{
    public function index()
    {
        $device = Contact::$device;
        $gametitle = Contact::$gametitle;

        return view('contacts.index', compact('device', 'gametitle'));
    }

    public function confirm(ContactRequest $request)
    {

        $contact = new Contact($request->all());


        return view('contacts.confirm', compact('contact'));
    }



    public function complete(ContactRequest $request)
    {
        $input = $request->except('action');

        if ($request->action === '戻る') {
            return redirect()->action('ContactsController@index')->withInput($input);
        }

        // データを保存
        Contact::create($request->all());

        // 二重送信防止
        $request->session()->regenerateToken();


       // 受信メール
       \Mail::send(new \App\Mail\Contact([
           'to' => 'crappy.naoto@gmail.com',
           'to_name' => 'Lobby',
           'subject' => 'サイトからのお問い合わせ',
           'from' => 'from@example.com',
           'from_name' => 'game_sns',
           // 'releasedate' => $request->releasedate,
           'device' => $request->device,
           // 'gametitle' => $request->gametitle,
           'note' => $request->note
       ],  ));

        return view('contacts.complete');
    }

}
