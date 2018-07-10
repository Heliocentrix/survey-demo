@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row">
          @include('admin.partials.side-menu')
          <div class="col-md-10">
               <div class="panel panel-default">
                    <div class="panel-heading">
                         <div class="row">
                              <div class="col-md-9"> Deleted Question  </div>                              
                         </div>
                    </div>                    
                    <div class="panel-body">                         
                         <ul class="list-group">
                              
                              @foreach ($archieves as $question)
                              
                              <li class="list-group-item" >
                                   <a href=""> {{$question->title}}</a>
                                   <span class="pull-right">
                                        <a href="/question/{{$question->id}}/retrieve"> <span class="btn btn-xs btn-default" >retrieve</span></a>
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
