<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Battle;
use App\Models\Knight;
use App\Models\Participant;

class BattleController extends Controller
{
    public function startBattle()
    {

        $participants = Knight::get()->sortByDesc('virtues')->take(3)->where('excluded_from_battle',0)->values();

        if($participants[0]->health < 20 || $participants[1]->health < 20 ){
            return "This battle is over already. Click start competition to beging anew!";
        }
        $battle = new Battle();
        $battle->save();


        $battle_id = $battle->id;
        $participants_id = Knight::get()->sortByDesc('virtues')->take(3)->where('excluded_from_battle',0)->pluck('id')->toArray();

        $data = [];

        foreach ($participants_id as $particpant_id) {
            $data[] = [
                'battle_id' => $battle_id,
                'knight_id' => $particpant_id
            ];
        }

        Participant::insert($data);

        return $this->fight($battle_id);
    }

    public function getFirstAttacker()
    {
        $participants = Knight::get()->sortByDesc('virtues')->take(3)->where('excluded_from_battle',0)->values();


        if($participants[0]->battle > $participants[1]->battle){
            return [$participants[0],$participants[1]];
        }else if ($participants[0]->battle == $participants[0]->battle){
            if($participants[0]->strength > $participants[0]->strength){
                return [$participants[0],$participants[1]];
            }
        }

        return [$participants[1],$participants[0]];

    }

    public function fight($battle_id)
    {
        $fighters = $this->getFirstAttacker();

        // dd($battle_id);

        $attacker = $fighters[0];
        $defender = $fighters[1];
        $messages = [];
        $battle = Battle::find($battle_id);


        for($i=1;$i<=Battle::ROUNDS;$i++){

            if($attacker->health < 20 ) {
                $messages[] = $defender->name . ' has won the fight !' ;
                $battle->log = json_encode($messages);
                $battle->save();
                return $messages;
            }

            if($defender->health < 20 ) {
                $messages[] = $attacker->name . ' has won the fight !';
                $battle->log = json_encode($messages);
                $battle->save();
                return $messages;
            }

            $damage = $attacker->strength + ($attacker->strength * $attacker->battle)/100 - $defender->defense;

            $messages[] = $attacker->name . ' damaged ' . $defender->name . ' with a ' . $damage . ' damage attack';

            $defender->health -= $damage;
            $defender->save();

            $messages[] = $defender->name . ' has  ' . $defender->health . ' health left. ' ;
            
            $attacker->battle = random_int(20, 40);
            $attacker->save();

            $temp = $attacker;
            $attacker = $defender;
            $defender = $temp;

        }
        $battle->log = json_encode($messages);
        $battle->save();
        return $messages;
    }
}
