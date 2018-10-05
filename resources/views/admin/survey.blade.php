@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="panel panel-default">
                    <div class="panel-heading">
                         <div class="row">
                              <div class="col-md-9"> Survey  </div>
                              <div class="col-md-3"><a href="question/create" class="btn btn-primary">Create Question</a></div>
                         </div>
                    </div>                    
                    <div class="panel-body">     
                         
                         <form class="form-horizontal" method="POST" action="/survey/sort">
                              {{ csrf_field() }}
                              
                              
                              <ul class="list-group sortable" id="sortable">
                                   
                                   @foreach ($questions as $question)
                                   
                                   <li class="list-group-item list-question" data-id="{{$question->id}}" data-survey-id="{{$question->survey_id}}">                                    
                                        <a href="/question/{{$question->id}}/edit">   {{$question->title}}</a>
                                        <span class="pull-right">
                                             <a href="/question/{{$question->id}}/delete"> <span class="btn btn-xs btn-default" >delete</span></a>
                                        </span>
                                   </li>  
                                   
                                   @endforeach
                              </ul>
                         </form>
                    </div>
               </div>
          </div>
          
          
     </div>
</div>
@endsection


@section('script')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
     $( function() {
          
          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });
          $('#sortable').sortable({
               update: function (event, ui) {
                    $data = [];
                    
                    $(".list-question").each(function( index ) {                         
                         $obj = {
                              'question_id' : $( this ).attr('data-id'),
                              'survey_id' : $( this ).attr('data-survey-id'),
                              'order' : index
                         }
                         
                         $data.push($obj);
                         
                    });
                   
                    // POST to server using $.post or $.ajax
                    $.ajax({
                         data: {'data' : $data},
                         type: 'POST',
                         url: '/api/survey/sort'
                         
                    }).success(function(data) {
                       //  console.log(data);
                     })
                     .error(function(data) { 
                         alert('Error: ' + data); 
                     });
               }
          });         
     } );
</script>
@endsection