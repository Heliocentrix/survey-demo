@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">

          <div class="col-md-10">
               <div class="panel panel-default">
                    <div class="panel-heading">
                         <div class="row">
                              <div class="col-md-9"> Survey Results  </div>                              
                         </div>
                    </div>                    
                    <div class="panel-body">                         
                         <div class="row" style="padding:15px">   
                              {{count($questions)}}
                              @foreach ($questions as $question)

                          
                              @foreach ($answers as $answer)
                            
                          
                              
                     
                              @if( $answer->question_id  == $question->id )
                              <div class="form-group">
                                   <div class="col-md-12 well ">
                                        <div class="question_title">{{$question->title}}</div>
                                        
                                        @if($question->question_type == "fillintheblank")
                                        <input type="text"  class="form-control" value="{{$answer->answer}}">
                                        
                                        @elseif($question->question_type == "multiple")
                                        @php
                                        {{-- map the answer of user to list of options --}}
                                        $ans_options =  array_map('intval', explode(',', $answer->answer));
                                        
                                        @endphp
                                        
                                        
                                        @foreach($question->options as $option)                         
                                        <div class="col-md-12">
                                             
                                             <div class="input-group">
                                                  <span class="input-group">
                                                       
                                                       <input type="checkbox" name="answer[{{$question->id}}][{{$option->id}}]" value="{{$option->id}}" {{ (in_array($option->id, $ans_options)) ? 'checked' : '' }}  > {{$option->text}}
                                                  </span>
                                             </div>
                                             
                                        </div>
                                        
                                        @endforeach

                                        
                                        @elseif($question->question_type == "single" ) 
                                        
                                        @php
                                        $ans = $answer->answer
                                        @endphp
                                        
                                        <div class="row">
                                             <div class="col-md-6">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio" {{$ans == 'yes' ? 'checked' : '' }} > YES
                                                       </span>
                                                  </div>
                                                  
                                             </div>
                                             <div class="col-md-6">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio" {{$ans == 'no' ? "checked" : '' }} > NO
                                                       </span>                                
                                                  </div>
                                                  
                                             </div>
                                        </div>
                                        @elseif($question->question_type == "truefalse" ) 
                                        
                                        @php
                                        $ans = $answer->answer
                                        @endphp
                                        
                                        <div class="row">
                                             <div class="col-md-6">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio" {{$ans == '1' ? 'checked' : '' }} > TRUE
                                                       </span>
                                                  </div>
                                                  
                                             </div>
                                             <div class="col-md-6">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio" {{$ans == '0' ? "checked" : '' }} > FALSE
                                                       </span>                                
                                                  </div>
                                                  
                                             </div>
                                        </div>
                                        @elseif($question->question_type == "textarea")
                                            <textarea type="text"class="form-control">{{$answer->answer}} </textarea>
                                        @elseif($question->question_type == "ratings")
                                        
                                        @php
                                        $ans = $answer->answer
                                        @endphp
                                        
                                        <div class="row ratings">
                                             <div class="col-md-2  col-md-offset-1">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio"  {{$ans == '1' ? "checked" : '' }}> 1
                                                       </span>
                                                  </div>
                                                  
                                             </div>
                                             <div class="col-md-2">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio"  {{$ans == '2' ? "checked" : '' }}> 2
                                                       </span>                                
                                                  </div>
                                                  
                                             </div>
                                             
                                             <div class="col-md-2">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio" {{$ans == '3' ? "checked" : '' }}> 3
                                                       </span>                                
                                                  </div>
                                                  
                                             </div>
                                             
                                             <div class="col-md-2">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio"  {{$ans == '4' ? "checked" : '' }}> 4
                                                       </span>                                
                                                  </div>
                                                  
                                             </div>
                                             
                                             <div class="col-md-2">
                                                  
                                                  <div class="input-group">
                                                       <span class="input-group">
                                                            <input type="radio"  {{$ans == '5' ? "checked" : '' }}> 5
                                                       </span>                                
                                                  </div>
                                                  
                                             </div>
                                        </div>
                                        @endif   
                                        
                                   </div>
                              </div>       
                              @endif
                              @endforeach
                              
                              
                              <br>
                              @endforeach
                              
                         </div>
                         
                    </div>
               </div>
          </div>          
     </div>
</div>
@endsection
