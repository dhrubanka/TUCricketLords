@extends('admin.layouts.app')
@section('title', 'Teams')

@section('content')

<div class="container" style="margin-top: 2em">
    <div class="row" >
        <div class="col-7 col-sm-8"><h4>Teams</h4></div>
        <div class="col-5 col-sm-4 text-right">
            <a href="/admin/team/create/"><button type="button" class="btn btn-primary m-1">
             Create Team</button></a>
        </div>
    </div>
   
    <div class="row ">
        @foreach( $teams as $team )
            <div class="col-sm-3">
                <div class="card" >
                
                <div class="card-body">
                    <h5 class="card-title">Team Name: {{ $team->team_name }}</h5>
                    <p class="card-text">Place: {{$team->place}}</p>
                    <a href="/admin/team/{{ $team->id }}/edit" class="btn btn-primary m-1">View|Edit</a>
                    <a href="/admin/players/{{ $team->id }}" class="btn m-1 btn-primary">Players </a>
                    <button type="button" class="btn btn-danger text-white m-1"  data-whatever="/admin/team/{{ $team->id }}/delete" data-toggle="modal" data-target="#exampleModal">Delete </button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete this Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this team? <br>
                    Note: All the players under this category will also be deleted !
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