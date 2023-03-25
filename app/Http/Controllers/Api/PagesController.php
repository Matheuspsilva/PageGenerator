<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $card;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card = $this->card->paginate('10');
        return response()->json($card, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $card = $this->card->findOrFail($id);

            return response()->json(['data' => [
                'data' => $card
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
		    return response()->json($message->getMessage(), 401);
        }
    }

}
