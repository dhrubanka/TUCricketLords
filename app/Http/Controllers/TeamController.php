<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        //
        $team = Team::all();

        return view('admin.team.index',['teams' => $team]);
    }

    

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
    
            Team::create([
                'team_name' => request('team_name'),
                'place' => request('place')
            ]);
    
            return redirect('/admin/team/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        
        $this->getValidate();
        $team->update([
            'team_name' => request('team_name'),
            'place' => request('place')
        ]);

        return redirect('/admin/team/'.$team->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        $team = Team::find($team->id);
        $team->delete();

        return redirect('/admin/team');
    }

    public function getValidate(): void
    {
        request()->validate([
            'team_name' => 'required',
            'place' => 'required'
        ]);
    }
}
