<div id="main-menu" role="navigation">
     <div id="main-menu-inner">
         <ul class="navigation">
          <li @if(in_array(Request::segment(1), ['dashboard'])) class="active" @endif><a href="{{ URL::to('') }}"><i class="menu-icon fa fa-home"></i><span class="mm-text">Dashboard</span></a></li>                    
          <li @if(in_array(Request::segment(1), ['survey'])) class="active" @endif > <a href="{{ route('survey') }}"><i class="menu-icon fa fa-tasks"></i><span class="mm-text">Survey</a></li>  
          <li @if(in_array(Request::segment(1), ['questions','question'])) class="active" @endif > <a href="{{ route('questions') }}"><i class="menu-icon fa fa-pencil-square""></i><span class="mm-text">Questions</a></li>  
          <li @if(in_array(Request::segment(2), ['reports']) || in_array(Request::segment(1), ['result']) ) class="active" @endif > <a href="{{ route('reports') }}"><i class="menu-icon fa fa-book"></i><span class="mm-text">Reports</a></li>  
          <li @if(in_array(Request::segment(2), ['archives'])) class="active" @endif >
               <a href="{{ route('archives') }}">   <i class="menu-icon fa fa-trash"></i><span class="mm-text">Archives</a>                            
          </li>

         </ul>
     </div>
 </div>
 

<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
     <button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>
     <div class="navbar-inner">
         <div class="navbar-header">
             <a href="/" class="navbar-brand" style="font-size:10px;">Survey Application</a>
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>
         </div>
         <div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
             <div>
                 <ul class="nav navbar-nav pull-right">
                     <li>
                         <a href="{{ URL::to('auth/logout') }}">Logout</a>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>


