<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokerController extends Controller
{
    public function selectCard(Request $request)
    {
        $code = $request->input('code');
        $name = $request->input('name');
        $card = $request->input('card');

        $participants = $request->session()->get('participants', []);
        if (isset($participants[$code])) {
            foreach ($participants[$code] as &$participant) {
                if ($participant['name'] === $name) {
                    $participant['selectedCard'] = $card;
                    break;
                }
            }
            $request->session()->put('participants', $participants);
        }

        return response()->json([
            'success' => true,
            'participants' => $participants[$code]
        ]);
    }
}
