<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardPostRequest;
use App\Models\Card;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CardController extends Controller
{

    private $card;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function index(){
        return view('generate');
    }

    public function generate(CardPostRequest $request){

        try {
            $site = config('app.url') . "/page/";

            $card = $request->all();

            $card = $this->card->create($card);
            $card->slug = Str::slug($card->name);
            $card->url = $site . $card->slug;
            $card->save();

            $qrcode = new QrCode;

            $qrcode = QrCode::size(300)->generate($card['url']);


            return view('qrcode')->with('qrcode', $qrcode)->with('card', $card);
        } catch (Exception $e) {
            DB::rollback();
            return Redirect::back()->withErrors(['msg' => 'Aconteu um erro inesperado! Contate o administrador do site']);
        }

    }

    public function showPage($slug = 'home'){
        $card = card::whereSlug($slug)->first();

        if($card != null){

            return view('page')->with('card', $card);
        }

        abort(404);
    }
}
