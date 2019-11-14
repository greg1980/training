<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\player;
use App\project;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

   public function index()
   {
   	
   	$players = player::paginate(6);
    $player_count = player::all()->count();
  
    return view('player.player', compact('players','player_count'));
   }

   public function create()
   {
     return view('player.player_create');
   }

   public function store()
   {
     $players = new player();

     $players->name = request('name');
     $players->answers = request('answers');
     $players->points = request('points');

     $players->save();

     return redirect('player');
   }

    public function edit($id)
    {
        //
       $player = player::findOrFail($id);
       return view('player.player_edit', compact('player'));
    }

    
    public function update(Request $request, $id)
    {

        $players = player::findOrFail($id);
       
        $players->name = request('name');
        $players->answers = request('answers');
        $players->points = request('points');

        $players->save();

        return redirect('player');

    }

    public function destroy($id)
    {

      player::findOrFail($id)->delete($id);
      return redirect('player');

    }

    public function show(Player $player)
    {
      player::findOrFail($id);
      return view('player_show', compact('player'));
    }
}
