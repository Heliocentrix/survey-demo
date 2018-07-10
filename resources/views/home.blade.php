@extends('layouts.app')

@section('content')
@if(isset($questions)) 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3> Seminar Survey</h3></div>    
                <div class="panel-body">                   
                    
                    
                        @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="" method="POST" action="/submit">
                        {{ csrf_field() }}                                            
                        <div class="row" style="padding:15px">   
                       
                            @foreach ($questions as $question)
                            
                            <div class="form-group">
                                <div class="col-md-12 well ">
                                    <div class="question_title">{{$question->sort_order+1 }}.  {{$question->title}}</div>
                                    
                                    @if($question->question_type == "fillintheblank")
                                    <input type="text" name="answer[{{$question->id}}]" class="form-control" required>
                                    @elseif($question->question_type == "multiple")
                                
                                    @foreach($question->options as $option)
                                            <div class="col-md-12">
                                                    
                                                    <div class="input-group">
                                                        <span class="input-group">
                                            
                                            <input type="checkbox" name="answer[{{$question->id}}][{{$option->id}}]" value="{{$option->id}}"> {{$option->text}}
                                                        </span>
                                                    </div>
                                                    
                                                </div>
                                            
                                    @endforeach
                                    @elseif($question->question_type == "single")
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <input type="radio" name="answer[{{$question->id}}]" value="yes" aria-label="..." required> YES
                                                </span>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <input type="radio" name="answer[{{$question->id}}]" value="no" aria-label="..." required> NO
                                                </span>                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @elseif($question->question_type == "textarea")
                                    <textarea type="text" name="answer[{{$question->id}}]" class="form-control"> </textarea>
                                    @elseif($question->question_type == "ratings")
                                    
                                    <div class="row ratings">
                                        <div class="col-md-2  col-md-offset-1">
                                            
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <input type="radio" name="answer[{{$question->id}}]"  value="1" aria-label="..."> 1
                                                </span>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-2">
                                            
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <input type="radio" name="answer[{{$question->id}}]"   value="2"  aria-label="..."> 2
                                                </span>                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-md-2">
                                            
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <input type="radio" name="answer[{{$question->id}}]"   value="3" aria-label="..."> 3
                                                </span>                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-md-2">
                                            
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <input type="radio" name="answer[{{$question->id}}]"   value="4"  aria-label="..."> 4
                                                </span>                                
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-md-2">
                                            
                                            <div class="input-group">
                                                <span class="input-group">
                                                    <input type="radio" name="answer[{{$question->id}}]"    value="5"  aria-label="..."> 5
                                                </span>                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    @endif   
                                    
                                </div>
                            </div>  
                            <br>
                            @endforeach
                            
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
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
@else
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Laravel Survey</div>
                <div class="panel-body">     
                    <p>Please register first to take the laravel survey.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif    
@endsection
