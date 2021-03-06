@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
          @include('admin.partials.side-menu')
          
          <div class="col-md-10">
               <div class="panel panel-default">
                    <div class="panel-heading">
                         <div class="row">
                              <div class="col-md-9"> Survey  </div>
                              {{--  <div class="col-md-3"><a href="survey/new" class="btn btn-primary">Create Survey</a></div>  --}}
                              <div class="col-md-3"><a href="survey/new" class="btn btn-primary">Create Question</a></div>
                         </div>
                    </div>                    
                    <div class="panel-body">                         
                         <ul class="list-group">
                              
                              @foreach ($questions as $question)
                              
                              <li class="list-group-item" >
                                   <a href="/survey/{{$question->id}}/edit"> {{$question->title}}</a>
                                   <span class="pull-right">
                                        <a href="/survey/{{$question->id}}/delete"> <span class="btn btn-xs btn-default" >delete</span></a>
                                   </span>
                              </li>  
                              
                              @endforeach
                         </ul>
                    </div>
               </div>
          </div>
          
          
     </div>
</div>
@endsection
