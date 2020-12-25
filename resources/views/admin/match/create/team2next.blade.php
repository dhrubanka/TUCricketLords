@extends('admin.layouts.app')

@section('title', 'Select Players')


@section('content')
    <div class="row" style="margin: 2em;">
    <div class="col-12 col-sm-8 offset-sm-2">
        <div class="card col-12  ">
            <h3 class="class-header m-3 text-center"><b>~Select Playering 11 for each team~ </b></h3>
            <form  method="POST" id="send_member_data" action="/admin/playingteam/store" >
                @csrf       
            <input type="hidden" id="custId" name="match_id" value="{{$match_id}}">
            
               <h3 class="class-header m-3 text-center"><b>Select Batsman for TEAM1: </b></h3>
               @foreach( $players1 as $player )  
               <div class="col-12  mx-auto">
                 
                  <label class="team1eleven" for="defaultCheck1">
                    Player Name -{{$player->player_name}}
                  </label>

                  <label class="team1eleven" for="defaultCheck1">
                    Role - {{$player->role}}
                  </label>

                  <input class="team1eleven" type="checkbox" name="players1[]" value="{{$player->id}}" id="{{$player->id}}">
                </div>
                @endforeach

                <h3 class="class-header m-3 text-center"><b>Select WicketKeeper for TEAM1: </b></h3>
                
                @foreach( $wks1 as $player )  
                <div class="col-12  mx-auto">
                  <label class="team1eleven" for="defaultCheck1">
                    Player Name - {{$player->player_name}}
                  </label>
                  <label class="team1eleven" for="defaultCheck1">
                    Role - {{$player->role}}
                  </label>
                  <input class="team1eleven" type="checkbox" name="wk1" value="{{$player->id}}" id="{{$player->id}}">
                </div>
                @endforeach

               <h3 class="class-header m-3 text-center"><b>Select Batsman for TEAM2: </b></h3>
               @foreach( $players2 as $player )  
               <div class="col-12  mx-auto">
                 
                  <label class="team1eleven" for="defaultCheck1">
                    Player Name -{{$player->player_name}}
                  </label>
                  <label class="team1eleven" for="defaultCheck1">
                    Role - {{$player->role}}
                  </label>
                  <input class="team1eleven" type="checkbox" name="players2[]" value="{{$player->id}}" id="{{$player->id}}">
                </div>
                @endforeach

                <h3 class="class-header m-3 text-center"><b>Select WicketKeeper for TEAM2: </b></h3>
                
                @foreach( $wks2 as $player )  
                <div class="col-12  mx-auto">
                  <label class="team1eleven" for="defaultCheck1">
                    Player Name - {{$player->player_name}}
                  </label>
                  <label class="team1eleven" for="defaultCheck1">
                    Role - {{$player->role}}
                  </label>
                  <input class="team1eleven" type="checkbox" name="wk2" value="{{$player->id}}" id="{{$player->id}}">
                </div>
                @endforeach

                
                
                 <div id="replaceme">
               
                <div class="text-center m-2">
                <button type="submit" class="btn btn-primary">Next</button>
                </div>
                </form>
                
        </div>
        </div>
    </div>
   

@endsection

