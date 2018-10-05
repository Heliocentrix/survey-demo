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
                         <ul class="list-group">
                              @foreach ($answers as $key => $value )
                                   @php
                                             $id = $value->user_id;
                                   @endphp
                              <li class="list-group-item" >
                                   <a href="/result/{{$id}}">Guest</a>                               
                              </li>  
                              
                              @endforeach
                         </ul>
                    </div>
               </div>
          </div>          
     </div>
</div>
@endsection
