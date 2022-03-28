<?php

namespace App\Http\Controllers;

use App\Mail\Letter;
use App\Models\Knight;
use App\Models\User;
use App\Notifications\LetterNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;;

class KnightController extends Controller
{
    const KNIGHTS = 5;
    public function createKnights()
    {
        Knight::query()->delete();
        Knight::factory(self::KNIGHTS)->create();

        return response()->json(Knight::all());
    }

    public function getKnights()
    {
        return response()->json(Knight::all());
    }

    public function sendLetter()
    {
        //o adresa random a printesei :)
        $princess = User::where('email','test@test.com')->get();
        Notification::send($princess, new LetterNotification());

        return response()->json(Knight::get()->sortByDesc('virtues')->take(3));
    }

    public function getCandidates()
    {
        return response()->json(Knight::get()->sortByDesc('virtues')->take(3));
    }

    public function excludeKnight($id)
    {
        if(!is_numeric($id)){
            return;
        }
        //aici s-ar putea trimite o notificare real time dar deja devine prea complicat
        //am incercat ceva cu singned url dar situatia se complica daca folosesc un foreach in un mailable,trebuie sincronizati knight id cu url param
        Knight::query()->update([
            "excluded_from_battle" => 0
        ]);
        $knight = Knight::where('id',$id)->update(['excluded_from_battle' => 1]);

    }

    public function getFinalists()
    {
        $knights = Knight::where('excluded_from_battle',1)->get();

        if(count($knights)!= 1) return response()->json([]);
        $finalists = Knight::get()->sortByDesc('virtues')->take(3)->where('excluded_from_battle',0);

        return response()->json($finalists);
    }
}
