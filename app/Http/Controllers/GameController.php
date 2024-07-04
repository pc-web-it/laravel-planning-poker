<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class GameController extends Controller
{
    public function newGame(Request $request)
    {
        $link = Str::random(10);
        $request->session()->put('gameCode', $link);
        $request->session()->put('participants', []);

        return redirect()->route('start-new-game', ['link' => $link]);
    }

    public function startNewGame($link)
    {
        return view('start-new-game', ['link' => $link]);
    }

    public function joinExistingGame(Request $request, ?string $code = "")
    {
     
        $gameCode = $request->segment(2); 

        return view('start-existing-game', ['link' => $gameCode, 'code' => $code]);
    }

    public function join(Request $request)
    {
        $name = $request->input('name');
        $code = $request->input('code');
    
        $participants = $request->session()->get('participants', []);
        $participants[$code][] = ['name' => $name, 'selectedCard' => null];
        $request->session()->put('participants', $participants);
        $request->session()->put('participantName', $name); // Save participant name in session
    
        return redirect()->route('game', ['link' => $code]);
    }
    



    public function game($link)
{
    
    $code = $link; 

    $participants = session('participants', []);
    $currentParticipants = $participants[$code] ?? [];

    return view('scrum-poker', ['participants' => $currentParticipants, 'code' => $code]);
}

}