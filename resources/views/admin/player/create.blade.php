@extends('admin.layouts.app')

@section('title', 'Create Category')


@section('content')
    <div class="row" style="margin: 2em;">
    <div class="col-12 col-sm-8 offset-sm-2">
        <div class="card col-10 offset-sm-1">
            <h3 class="class-header m-3 text-center"><b>Create a new Team</b></h3>
            <form method="POST" action="/admin/player/store" enctype="multipart/form-data">
                @csrf
                @isset($team_id)
                <input hidden name="team_id" value="{{ $team_id }}" placeholder="team_id">
                @endisset

                @isset($teams)
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Player's Team :</label>
                    <select class="form-control" name="team_id" id="exampleFormControlSelect1">

                        @foreach( $teams as $team )
                            <option value="{{$team->id}}">{{ $team->team_name}}</option>
                        @endforeach
                        
                    </select>
                 </div>
                @endisset
                <div class="form-group row">
                    <label for="player_name" class="col-md-2 col-form-label">Player Name:</label>
                    <div class="col-md-10">
                        <input type="text"
                               class="form-control @error('player_name') is-invalid  @enderror"
                               id="player_name"
                               name="player_name"
                               placeholder="Enter Player Name"
                               value="{{ old('player_name') }}" >
                     </div>
                     @error('player_name')
                        <p class="text-danger" >{{ $errors->first('player_name')}}</p>
                     @enderror

                </div>

                <div class="form-group row">
                    <label for="age" class="col-md-2 col-form-label">Age :</label>
                    <div class="col-md-10">
                        <input type="text"
                               class="form-control @error('age') is-invalid  @enderror"
                               id="age"
                               name="age"
                               placeholder="Enter Age"
                               value="{{ old('age') }}" >
                     </div>
                     @error('age')
                        <p class="text-danger" >{{ $errors->first('age')}}</p>
                     @enderror

                </div>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-md-2 col-form-label">Role :</label>
                    <div class="col-md-10">
                    <select class="form-control" name="role" id="exampleFormControlSelect1">
                      <option value="1">1. Batsman</option>
                      <option value="2">2. Bowler</option>
                      <option value="3">3. All Rounder</option>
                      <option value="4">4. WicketKeeper</option>
                    </select>
                  </div>
                 </div>
               
                <div class="text-center m-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
        </div>
        </div>
    </div>
@endsection


