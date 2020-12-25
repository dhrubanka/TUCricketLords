<?php

namespace App\Http\Controllers;

use App\Match;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matches = DB::select('select * from matches');

        return view('admin.match.index',['matches' => $matches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $teams = Team::all();
        return view('admin.match.create',['teams'=> $teams]);
    }

    public function fetch(Request $request)
    {
     $team1 = request('team1_id');
     
     $teams2 = DB::select('select * from teams where  id != ?', [$team1]);
    
     
     

     //$teams2= Team::all();

     
       return response()->json($teams2);
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
     $current_time = \Carbon\Carbon::now()->toDateTimeString();
     $team1= request('team1_id');
     $team2= request('team2_id');
     $toss= request('toss');
     $first= request('start_innings') ;

     DB::table('matches')->insert(
        ['team1_id' => $team1, 'team2_id' => $team2, 'toss' => $toss, 
        'start_innings' => $first, 'created_at' => $current_time]
    );

 
      $players1 = DB::select('select * from players where team_id = ?', [$team1]);
      $players2 = DB::select('select * from players where team_id = ?', [$team2]);

      $wks1 = DB::select('select * from players where team_id = ? and role_id = ?', [$team1, 4]);
      $wks2 = DB::select('select * from players where team_id = ? and role_id = ?', [$team2, 4]);
      //$match_id=  DB::select('select id from "matches" where "created_at" = ? ', [$current_time]);
      $match = Match::where('created_at', $current_time)->first();
     

      return view("admin.match.create.team2next",['players1' => $players1, 'players2' => $players2,
    'wks1' => $wks1, 'wks2' => $wks2 , 'match_id' => $match->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }

    public function getValidate(): void
    {
        request()->validate([
            'team1_id' => 'required|numeric',
            'team2_id' => 'required|numeric',
            'toss' => 'required|numeric',
            'start_innings' => 'required|numeric'
            

        ]);
    }
}
