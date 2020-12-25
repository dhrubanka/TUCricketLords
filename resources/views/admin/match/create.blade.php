@extends('admin.layouts.app')

@section('title', 'Start a Match')


@section('content')
    <div class="row" style="margin: 2em;">
    <div class="col-12 col-sm-8 offset-sm-2">
        <div class="card col-10 offset-sm-1">
            <h3 class="class-header m-3 text-center"><b>MATCH CREATION</b></h3>
            <form  method="POST" id="send_member_data" action="/admin/match/create" >
                @csrf       
                <div class="form-group row">
                    <label for="team1_id" class="col-md-2 col-form-label">Team 1</label>
                    <div class="col-md-10">
                    <select class="form-control"  name="team1_id" id="team1_id">
                        <option > Select Team 1</option>
                        @foreach( $teams as $team ) 
                        <option value="{{$team->id}}">{{ $team->team_name}}</option>
                        @endforeach
                    </select>
                  </div>
                 </div>
                 
                 <div class="form-group row">
                    <label for="team2_id" class="col-md-2 col-form-label">Team 2</label>
                    <div class="col-md-10">
                    <select class="form-control" disabled name="team2_id" id="team2_id">
                        <option > Select Team 2</option>
                    </select>
                  </div>
                 </div>

                
                 <div class="form-group row">
                    <label for="toss" class="col-md-2 col-form-label">Toss</label>
                    <div class="col-md-10" id="toss">
                        <div class="form-check form-check-inline" >
                            <input class="form-check-input" name="toss" type="radio" id="toss1" value="" disabled>
                            <label class="form-check-label" for="toss1">Team 1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="toss" type="radio" id="toss2" value="" disabled>
                            <label class="form-check-label" for="toss2">Team 2</label>
                          </div>
                          
                  </div>
                 </div>

                 <div class="form-group row">
                    <label for="start_innings" class="col-md-2 col-form-label">First Innings</label>
                    <div class="col-md-10" id="start_innings">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="start_innings" type="radio" id="start_innings1" value="" disabled>
                            <label class="form-check-label" for="start_innings1">Team 1</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="start_innings" type="radio" id="start_innings2" value="" disabled>
                            <label class="form-check-label" for="start_innings2">Team 2</label>
                          </div>
                          
                  </div>
                 </div>

                
                
                 <div id="replaceme">
               
                <div class="text-center m-2">
                <button type="submit" class="btn btn-primary">Next</button>
                </div>
                </form>
                
        </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script type="text/javascript" >
        $(document).ready(function() {
            next();
            $('#team1_id').change(function(){
                teamsSelected1()});
            $('#team2_id').change(function(){
                teamsSelected2()});

           
        });
        
        function next(){
     
                                    
            $("#team1_id").on("change",  function(e){
                e.preventDefault();
                let team1 = $('#team1_id').val();

               
                $.ajax({
                    url : '/admin/match/fetch',
                    type: 'GET',
                   
                    data: {team1_id: team1},
                    success: function (data) {
                        
                    $('#team2_id').removeAttr('disabled');
                   // $('#team2_id').empty();
                    $.each(data,function(index,team2){
                        $('#team2_id').append('<option value="'+team2.id+'">'+team2.team_name+'</option>');
                        })

                        
                    }
                    
                });
                
            });
        }
     function teamsSelected1(){
        let team1 = $('#team1_id').val();
        
        
        
        $('#toss1').val(team1);
        
       
        $('#start_innings1').val(team1);

       
     }

     function teamsSelected2(){
       
         let team2 = $('#team2_id').val();

       
         $('#toss1').removeAttr('disabled');
         $('#toss2').removeAttr('disabled');

         $('#toss2').val(team2);

         //$('#toss').removeAttr('disabled');
         $('#start_innings1').removeAttr('disabled');
         $('#start_innings2').removeAttr('disabled');

         $('#start_innings2').val(team2);

        
     }
                            
    
         
     
        
    </script>

@endsection


