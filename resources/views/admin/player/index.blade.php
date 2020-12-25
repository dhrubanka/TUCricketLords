@extends('admin.layouts.app')
@section('title', 'Teams')

@section('content')

<div class="container" style="margin-top: 2em">
    <div class="row" >
        <div class="col-7 col-sm-8"><h4>Teams</h4></div>
        <div class="col-5 col-sm-4 text-right">
        <a href="{{route('team-create-direct')}}"><button type="button" class="btn btn-primary m-1">
             Create a Player and Add to list</button></a>
        </div>
    </div>
   
    <div class="row ">
        @foreach( $players as $player )
            <div class="col-sm-3">
                <div class="card" >
                
                <div class="card-body">
                    <h5 class="card-title">Player Name: {{ $player->player_name }}</h5>
                    <p class="card-text">Player Role: {{$player->role}}</p>
                    <a href="/admin/player/{{ $player->id }}/edit" class="btn btn-primary m-1">View|Edit</a>
                    <button type="button" class="btn btn-danger text-white m-1"  data-whatever="/player/team/{{ $player->id }}/delete" data-toggle="modal" data-target="#exampleModal">Delete </button>
                </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete this Player</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this player ? <br>
                    Note: Keep only good players unlike Prithvi Shaw !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a type="button" id="deletecategory" href="" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script type="text/javascript" >
        $(document).ready(function() {
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('whatever') ;// Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

                $('#deletecategory').attr('href', id);
            });
        });
    </script>

@endsection()