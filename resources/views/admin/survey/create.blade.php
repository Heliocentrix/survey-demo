@extends('layouts.app')

@section('content')
@include('admin.survey.header')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        
        <div class="panel-body">                         
          <form action="/survey/store" method="POST" class="createSurveyForm form" enctype="multipart/form-data">
            {{ csrf_field() }}            

            
            <div class="form-group{{ $errors->has('survey_name') ? ' has-error' : '' }}">
              <label for="title" class="col-md-4 control-label">Title</label>                          
              <div class="col-md-6">                              
                <input type="text" name="survey_name"  class="form-control" >                                     
                @if ($errors->has('survey_name'))
                <span class="help-block">
                  <strong>{{ $errors->first('survey_name') }}</strong>
                </span>
                @endif                                                          
              </div>
            </div>
            
            <div class="form-group{{ $errors->has('survey_name') ? ' has-error' : '' }}">
              <label for="survey_name" class="col-md-4 control-label">URL</label>                                
              <div class="col-md-6">                              
                <input type="text" name="survey_url"  class="form-control" placeholder="">
                
                @if ($errors->has('survey_url'))
                <span class="help-block">
                  <strong>{{ $errors->first('survey_url') }}</strong>
                </span>
                @endif                                                        
              </div>
            </div>
            
            <div class="form-group{{ $errors->has('survey_name') ? ' has-error' : '' }}">
              <label for="survey_name" class="col-md-4 control-label">Description</label>                                
              <div class="col-md-6">                              
                <textarea name="survey_description"  class="form-control" placeholder=""></textarea>
                
                @if ($errors->has('survey_description'))
                <span class="help-block">
                  <strong>{{ $errors->first('survey_description') }}</strong>
                </span>
                @endif                                                     
              </div>
            </div>
            <div class="form-group{{ $errors->has('survey_name') ? ' has-error' : '' }}">
              <label for="survey_name" class="col-md-4 control-label">Category</label>                                
              <div class="col-md-6">                              
                <select class="form-control" name="category_id">
                  <option>Please select a category</option>
                  @foreach($survey_categories as $survey_category)
                  <option value="{{$survey_category->id}}">{{$survey_category->name}}</option>
                  @endforeach
                  
                </select>                                                
              </div>
            </div>
               
            <div class="form-group{{ $errors->has('survey_logo') ? ' has-error' : '' }}">
              <label for="survey_name" class="col-md-4 control-label">Logo</label>                                
              <div class="col-md-6">                              
                <input type="file" name="survey_logo" />
                
                @if ($errors->has('survey_logo'))
                <span class="help-block">
                  <strong>{{ $errors->first('survey_logo') }}</strong>
                </span>
                @endif                                                     
              </div>
            </div>
            <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
              <label for="survey_name" class="col-md-4 control-label">Banner</label>                                
              <div class="col-md-6">                              
                <input type="file" name="banner" />
                
                @if ($errors->has('banner'))
                <span class="help-block">
                  <strong>{{ $errors->first('banner') }}</strong>
                </span>
                @endif                                                     
              </div>
            </div>
            <div class="form-group{{ $errors->has('background_colour') ? ' has-error' : '' }}">
              <label for="survey_name" class="col-md-4 control-label">Background Colour</label>                                
              <div class="col-md-2">                              
                <input type="color" name="background_colour"  class="form-control" placeholder="">
                
                @if ($errors->has('background_colour'))
                <span class="help-block">
                  <strong>{{ $errors->first('background_colour') }}</strong>
                </span>
                @endif                                                        
              </div>
            </div>
            <div class="form-group{{ $errors->has('colour') ? ' has-error' : '' }}">
              <label for="survey_name" class="col-md-4 control-label"> Colour</label>                                
              <div class="col-md-2">                              
                <input type="color" name="colour"  class="form-control" placeholder="">
                
                @if ($errors->has('colour'))
                <span class="help-block">
                  <strong>{{ $errors->first('colour') }}</strong>
                </span>
                @endif                                                        
              </div>
            </div>
            
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary pull-right">
                  Submit
                </button>
              </div>
            </div>
          </form>                           
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


@section('script')

<script>
  
  $( function() {
    $('.add-button').hide();
    $('.select-survey-type').on('change',function(){
      var selected = $(this).val()
      
      
      if(selected == "multiple"){
        $('.add-button').show();
      }
      console.log(selected);
    });
    $('#add').on('click', function( e ) {
      e.preventDefault();
      $('.survey-choices').append("<input type='text' name='options[]' class='form-control'> <br>");
    });
    $(document).on('click', 'button.remove', function( e ) {
      e.preventDefault();
      $(this).closest( 'div.new-text-div' ).remove();
    });
    
  });
</script>

{{--  <script>
  
  $('.select-survey-type').on('change',function(){
    console.log($(this).val());
    var selected = $(this).val();
    
    var data =  ""; 
    if(selected == "single"){
      data += "<div class='form-group'>";
        data += "<label for='title' class='col-md-4 control-label'>Choices</label>";
        data += "<div class='col-md-6'>";
          data += " <ul id='choice-list'><li><input type='text' class='form-control'></li>";
            data += " </ul><button type='button' id='add-choices' class=' btn btn-primary'>add</button>";
            data += "</div>";                    
            data += "</div>";
            
            
          }
          $('.survey-choices').append(data);
        });
        
        
        
        $('#add-choices').click(function(){
          console.log("test")
          $('#choice-list').append("<li><input type='text' class='form-control'></li>");    
        });
      </script>
      --}}
      @endsection