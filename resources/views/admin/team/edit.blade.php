@extends('admin.layouts.app')

@section('title', 'Create Category')


@section('content')
    <div class="row" style="margin: 2em;">
    <div class="col-12 col-sm-8 offset-sm-2">
        <div class="card col-10 offset-sm-1">
            <h3 class="class-header m-3 text-center"><b>Update Team</b></h3>
        <form method="POST" action="/admin/team/{{$team->id}}/update" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="team_name" class="col-md-2 col-form-label">Team</label>
                    <div class="col-md-10">
                        <input type="text"
                               class="form-control @error('team_name') is-invalid  @enderror"
                               id="team_name"
                               name="team_name"
                               placeholder="Enter Team Name"
                               value="{{ $team->team_name }}" >
                     </div>
                     @error('team_name')
                        <p class="text-danger" >{{ $errors->first('team_name')}}</p>
                     @enderror

                </div>

                <div class="form-group row">
                    <label for="place" class="col-md-2 col-form-label">Place</label>
                    <div class="col-md-10">
                        <input type="text"
                               class="form-control @error('place') is-invalid  @enderror"
                               id="place"
                               name="place"
                               placeholder="Enter Place"
                               value="{{ $team->place }}" >
                     </div>
                     @error('place')
                        <p class="text-danger" >{{ $errors->first('place')}}</p>
                     @enderror

                </div>
               
               
                <div class="text-center m-2">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
        </div>
        </div>
    </div>
@endsection


