<?php

namespace App\Http\Controllers;

use App\Playingteam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayingteamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.match.create.team2next');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $match_id = request('match_id');
     
    foreach ($request->players1 as $key => $players1) {
      
        $player_id = $players1[$key];
        $role = DB::select('select role_id from players where id = ?', [$player_id]);
     
        DB::table('playingteam')->insert(
            ['match_id' => $match_id, 'player_id' => $player_id, 'role' => $role[0]->role_id]
        );
    }

    DB::table('playingteam')->insert(
        ['match_id' => $match_id, 'player_id' => request('wk1'), 'role' => 4]
    );

    foreach ($request->players2 as $key => $players2) {
      
        $player_id = $players2[$key];
        $role = DB::select('select role_id from players where id = ?', [$player_id]);
     
        DB::table('playingteam')->insert(
            ['match_id' => $match_id, 'player_id' => $player_id, 'role' => $role[0]->role_id]
        );
    }

    DB::table('playingteam')->insert(
        ['match_id' => $match_id, 'player_id' => request('wk2'), 'role' => 4]
    );
   
    
    return view('admin.match.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Playingteam  $playingteam
     * @return \Illuminate\Http\Response
     */
    public function show(Playingteam $playingteam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Playingteam  $playingteam
     * @return \Illuminate\Http\Response
     */
    public function edit(Playingteam $playingteam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Playingteam  $playingteam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playingteam $playingteam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Playingteam  $playingteam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playingteam $playingteam)
    {
        //
    }
}
