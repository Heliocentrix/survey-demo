@extends('layouts.app')

@section('content')
@include('admin.survey.header')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          
          <form class="form-horizontal" method="POST" action="/survey/sort">
            {{ csrf_field() }}
            
            
            <table class="table table-striped questions_table">
              <tr>
                <th style="width:100px;" class="hidden-xs">ID</th>
                <th>Name</th>
                <th style="width:210px;" class="text-right">Options</th>
              </tr>                       
              @foreach ($questions as $question)
              
              <tr data-id="{{$question->id}}" data-survey-id="{{$question->survey_id}}">                                    
                <td>  <a href="/question/{{$question->id}}/edit">   {{$question->id}}</a> </td>
                <td>  <a href="/question/{{$question->id}}/edit">   {{$question->title}}</a> </td>
                <td>
                    <a href="" class="pull-right assign-question"  data-id="{{$question->id}}"  data-name="{{$question->title}}" > <span class="btn btn-xs btn-success" >assign</span></a>
                </td>
              </tr>  
              
              @endforeach
            </table>
          </form>
        </div>
      </div>
    </div>
    
    <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            
            <form class="form-horizontal" method="POST" action="/survey-questions/store">
              {{ csrf_field() }}
              <input type="hidden" name="survey_id" value="{{$survey->id}}">
              
              <table class="table table-striped survey_questions_table"> 
                <tr>
                  <th style="width:100px;" class="hidden-xs">ID</th>
                  <th>Name</th>
                  <th style="width:210px;" class="text-right">Options</th>
                </tr>          
                
                {{--  foreach ($survey->survey_questions  as $key => $value) {
                  dd($value->question->title);
              }  --}}
                 @foreach ($survey->survey_questions  as $key => $survey)
                
                <tr data-id="{{$survey->question->id}}" data-survey-id="{{$survey->question->id}}">                                    
                  <td>  <a href="/question/{{$survey->id}}/edit">   {{$survey->question->id}}</a> </td>
                  <td>  <a href="/question/{{$survey->id}}/edit">   {{$survey->question->title}}</a> </td>
                  <td>
                    <a href="" class="pull-right  unassign-question"   data-id="{{$survey->question->id}}"  > <span class="btn btn-xs btn-danger" >unassign</span></a>
                  </td>
                </tr>  
                
                @endforeach  
              </table>
              <button type="submit" class="btn " style="float:right;margin-top:20px;">Submit</button>
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

       
 
    $('.assign-question').on('click', function(event) {    
      event.preventDefault();
      var data;
      id = $(this).attr('data-id');
      name = $(this).attr('data-name');
      data = "<tr id="+id+">";
      data += "<td>"+id+"<input type='hidden' name='question_ids[]' value='"+id+"'></td>";
      data += "<td>"+name+"</td>";
      data += "<td><a href='#' class='test pull-right unassign-question' data-id='"+id+"' data-name='"+name+"'><span class='btn btn-xs btn-danger'>unassign</span></a></td>";
      data += "</tr>";
      $('.survey_questions_table').append(data);
      $(this).closest('tr').remove();
    });
 

  

    $('.unassign-question').on('click', function(event) {    
      event.preventDefault();
      console.log("adasd");
      $(this).closest('tr').remove();
    });





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
  });
</script>
@endsection