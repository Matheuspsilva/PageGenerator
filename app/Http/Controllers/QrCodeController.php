<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{

    private $card;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function index(){
        return view('home');
    }

    public function generate(Request $request){

        $card = $request->all();
        $site = 'https://matheuspsilvadev.com/';
        $card["url"] = $site . $card["name"];

        $qrcode = new QrCode;


        $qrcode = QrCode::size(300)->generate($card['url']);

        $card = $this->card->create($card);
        $card->save();


        return view('qrcode')->with('qrcode', $qrcode) ;

    }

    public function showPage($slug = 'home'){
        $card = card::whereName($slug)->first();
        return view('page')->with('card', $card);
    }
}
