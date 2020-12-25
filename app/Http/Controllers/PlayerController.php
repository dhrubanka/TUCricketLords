<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();

        return view('admin.player.index',['players' => $players]);
    }

    public function indexTeamId($team_id){
        $team = Team::find($team_id);
      //  $players = Player::where('id', $team_id )->get();
        $players = DB::select('select * from players where team_id = ?', [$team_id]);
        return view('admin.team.players',['players' => $players, 'team' => $team]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($team_id)
    {
       
        return view('admin.player.create',['team_id'=>$team_id]);
       
    }
    public function createDirect()
    {
       
            $teams = Team::all();
            return view('admin.player.create',['teams'=>$teams]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->getValidate();
        $role=request('role');
        if($role == 1){
            $bat = 1;
            $bowl =0;
            $wicketkeeper=0;
            $role = "Batsman";
        }elseif($role == 2){
            $bat = 0;
            $bowl =1;
            $wicketkeeper=0;
            $role = "Bowler";
        }elseif($role == 3){
            $bat = 1;
            $bowl =1;
            $wicketkeeper=0;
            $role = "All Rounder";
        }elseif($role == 4){
            $bat = 1;
            $bowl =0;
            $wicketkeeper=1;
            $role = "Batsman WicketKeeper";
        }
        Player::create([
            'team_id' => request('team_id'),
            'player_name' => request('player_name'),
            'age' => request('age'),
            'role' => $role,
            'role_id' => request('role')

        ]);

        return redirect('/admin/players');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }

    public function getValidate(): void
    {
        request()->validate([
            'team_id' => 'required',
            'player_name' => 'required',
            'age' => 'required',
            'role' => 'required'

        ]);
    }
}
