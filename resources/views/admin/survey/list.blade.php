@extends('layouts.app')

@section('content')
<div class="page-header">
          <div class="row">
               <h1 class="col-xs-12 col-sm-9 text-center text-left-sm"><i class="fa fa-tasks page-header-icon"></i>Survey</h1>
               <div class="col-xs-12 col-sm-3">
                    <div class="row">
                         {{--  <a href="survey/category/create" class="btn btn-primary pull-right"><span class="btn-label icon fa fa-plus"></span> Add Category</a>  --}}
                         <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addCategoryModal"><span class="btn-label icon fa fa-plus"></span> Add Category</button>
                         <button type="button" class="btn btn-primary pull-right" style="margin-bottom:5px; margin-right:5px;" data-toggle="modal" data-target="#createSurveyModal"><span class="btn-label icon fa fa-plus"></span> Create Survey</button>
                         
                    </div>
               </div>
          </div>
     </div>
<div class="container">

     
     <div class="row">
          <div class="col-md-12">
               <div class="panel panel-default">
                    <div class="panel-heading">
                        <!-- <div class="row">
                              <div class="col-md-9 col-xs-12">  Survey  </div>
                              <div class="col-md-3 col-xs-12">
                                   {{--  <a href="survey/create" class="btn btn-primary pull-right "><span class="btn-label icon fa fa-plus"></span> Create Survey</a>  --}}
                                  
                                   
                              </div>
                              
                         </div>-->

                         <form class="form-horizontal" method="POST" action="/survey/sort">
                              {{ csrf_field() }}
                              
                              
                              <table class="table table-striped">
                                        <tr>
                                             <th style="width:100px;" class="hidden-xs">ID</th>
                                             <th>Name</th>
                                             <th style="width:210px;" class="text-right">Options</th>
                                        </tr>                       
                                   @foreach ($surveys as $survey)                                   
                                   <tr data-id="{{$survey->id}}" data-survey-id="{{$survey->id}}">                                    
                                        <td><a href="/survey/{{$survey->id}}/edit">   {{$survey->id}}</a></td>
                                        <td><a href="/survey/{{$survey->id}}/edit">   {{$survey->name}}</a></td>
                                        <td>
                                      
                                           
                                             <a href="/survey/{{$survey->id}}/delete" > <span class="btn btn-xs btn-default" >view</span></a>
                                             <a href="/survey/{{$survey->id}}/assignQuestions"> <span class="btn btn-xs btn-default" >assign question</span></a>
                                             <a href="/survey/{{$survey->id}}/delete"> <span class="btn btn-xs btn-default" >delete</span></a>
                                             {{--  <button type="button" class="btn btn-primary pull-right" style="margin-bottom:5px; margin-right:5px;" ><span class="btn-label icon fa fa-plus"></span> Create Survey</button>  --}}
                                             
                                        </td>
                                   </tr>                                     
                                   @endforeach
                              </table>
                         </form>
                    </div>
               </div>
          </div>
          
          
     </div>
</div>


<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="true">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                         <h4 class="modal-title" id="addCategory">Add Category</h4>
                    </div>
                         <div class="modal-body">
                              <form action="/survey/category/create" method="POST" class="addCategoryForm form">
                                   {{ csrf_field() }}                                   
                                   <div class="row">
                                          <div class="form-group">
                                            <input type="text" name="category_name"  value="{{ old('category_name') }}" class="form-control" required placeholder="Category name">
                                             
                                              @if ($errors->has('category_name'))
                                              <span class="help-block">
                                                   <strong>{{ $errors->first('category_name') }}</strong>
                                              </span>
                                              @endif
                                         </div>
                                          <div class="form-group">
                                             <textarea id="category_description" type="text" class="form-control" name="category_description" value="{{ old('category_description') }}"  autofocus placeholder="Category Description"></textarea>
                                              @if ($errors->has('category_description'))
                                              <span class="help-block">
                                                   <strong>{{ $errors->first('category_description') }}</strong>
                                              </span>
                                              @endif
                                         </div>
                                         <div class="form-group pull-right">
                                              <button class="btn" type="submit">Submit</button>
                                         </div>
                                   </div>
                               </form>
                    </div>
               </div>
          </div>
     </div>


     <div class="modal fade" id="createSurveyModal" tabindex="-1" role="dialog" aria-labelledby="createSurvey" aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="createSurvey">Create Survey</h4>
                         </div>
                              <div class="modal-body">
                                   <form action="/survey/store" method="POST" class="createSurveyForm form">
                                        {{ csrf_field() }}                                   
                                        <div class="row">
                                               <div class="form-group">
                                                 <input type="text" name="survey_name"  value="{{ old('survey_name') }}" class="form-control" placeholder="Survey name">
                                                  
                                                   @if ($errors->has('survey_name'))
                                                   <span class="help-block">
                                                        <strong>{{ $errors->first('survey_name') }}</strong>
                                                   </span>
                                                   @endif
                                              </div>

                                              <div class="form-group">
                                                       <input type="text" name="survey_url"  value="{{ old('survey_url') }}" class="form-control" placeholder="Survey Url">
                                                        
                                                         @if ($errors->has('survey_url'))
                                                         <span class="help-block">
                                                              <strong>{{ $errors->first('survey_url') }}</strong>
                                                         </span>
                                                         @endif
                                                    </div>


                                                    <div class="form-group">
                                                            <textarea name="survey_description"  value="{{ old('survey_description') }}" class="form-control" placeholder="Survey Description"></textarea>
                                                             
                                                              @if ($errors->has('survey_description'))
                                                              <span class="help-block">
                                                                   <strong>{{ $errors->first('survey_description') }}</strong>
                                                              </span>
                                                              @endif
                                                         </div>
     
                                               <div class="form-group">
                                                  <select class="form-control" name="category_id">
                                                       <option>Please select a category</option>
                                                       @foreach($survey_categories as $survey_category)
                                                       <option value="{{$survey_category->id}}">{{$survey_category->name}}</option>
                                                       @endforeach
                                                       
                                                  </select>
                                              </div>
                                              <div class="form-group pull-right">
                                                   <button class="btn" type="submit">Submit</button>
                                              </div>
                                        </div>
                                    </form>
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