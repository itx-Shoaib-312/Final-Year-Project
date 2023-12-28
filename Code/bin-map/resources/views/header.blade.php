<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{ asset('/public/style.css') }}">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<!-- sheet js library -->
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    body {
    background-color: #e3e3e3;
  }
  .sideBar {
    background-color: #fff;
    height: 100%;
    border-radius: 20px;
  }
  .mainC {
    --bs-gutter-x: 0pc !important;
  }
  .mainContent {
    background-color: #fff;
    border-radius: 10px;
    width: 74%;
  }
  
  #navbarNav{
    justify-content: flex-end;
  }
  .expBtn{
    background-color: #329600 !important;
    color: #fff !important;
  }
  .upperSection{
    border-bottom: 1px solid #e3e3e3;
    padding: 4px;
  }
  .secNav{
    margin-right: 100px;
  }
  .line{
    width: 2px;
    height: 10px;
    background-color: #329600;
    margin-top: 15px;
  }
  .active{
    background-color: #329600 !important;
  }
  .inpS{
    border: none;
    outline: none;
    background-color: #EBEBEB;
  }
  .inpG{
    border: 1px solid #D2E3EF;
    width: fit-content;
    padding: 5px;
    border-radius: 5px;
    background-color: #EBEBEB;

  }
  .myNav{
    background-color: #FFFFFF;
  }

  .checkbox {
opacity: 0;
position: absolute;
}

.label {
width: 50px;
height: 26px;
background-color:#EBEBEB;
display: flex;
border-radius:50px;
align-items: center;
justify-content: space-between;
padding: 5px;
position: relative;
transform: scale(1.5);
}


.ball {
width: 20px;
height: 20px;
background-color:#329600;
position: absolute;
top: 2px;
left: 2px;
border-radius: 50%;
transition: transform 0.2s linear;
}

/*  target the elemenent after the label*/
/* .checkbox:checked + .label .ball{
transform: translateX(24px);
} */
.ch{
  transform: translateX(24px);
}
.ch2{
  transform: translateX(-24px);
}
.lightDarkMode{
margin-top: 250px;
}
.darkMode{
background-color: #333 ;
color: #fff !important;
}
.darkMode label{
  color: #fff !important;
}
.darkMode select{
  color:#fff !important
}
.darkMode button{
  color: #fff;
}
.logBtn{
    background-color: #329600;
    color: #fff;
    font-weight: 700;
}
.logText{
    color:#329600
}
.nav-link{
  color: black;
}
.active{
  color:green;
  background:#fff;
}
.nav-tabs .nav-link.active{
  color:#fff !important;
  
}
.tab-pane.active{
  background:#fff !important;
}

.right label{
  color: #329600;
  font-weight: 600;
}
.right input{
  border:1px solid #329600;
}

.right input[type=radio]{
  border:1px solid #329600;
}
.right textarea{
  border:1px solid #329600;
}
.sendBtn{
  background-color: #329600;
  width: 50%;
  color: #fff;
  font-size: large;
  font-weight: 700;
  border-radius: 20px;
}
.sendBtn:hover{
  background-color:#EBEBEB;
  border: 1px solid #329600;
}
.paginate_button {
  color: #fff !important;
  background-color: #EBEBEB !important;

}
.mainWidth{
  width:100%
}

  @media only screen and (max-width: 822px){
/*Big smartphones [426px -> 600px]*/
.sideBar{
width: 100%;
}
.mainContent{
width: 100%;
}
}
    </style>
    <title>Binmap</title>
    <link rel="icon" type="image/x-icon" href="{{ url('images\logo.png') }}">
  </head>
  <nav class="navbar p-4 navbar-expand-lg  myNav  d-flex justify-content-between" id="navM">
      <div class="d-flex justify-content-between">
      <a class="navbar-brand" href="#"
        ><img src="{{ url('images\logo.png') }}" alt="My Image"></a>
        <button class="btn" id="slide"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-layout-text-sidebar-reverse" viewBox="0 0 16 16">
        <path d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"/>
        <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z"/>
      </svg></button>
    </div>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg></span>
      </button>
      <div
        class="collapse navbar-collapse "
        id="navbarNav"
      >
     
      <div class=" secNav">
       
        <ul class="navbar-nav" id="navUl">
          <li class="nav-item">
            <a class="nav-link" href="#"><p>News</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">For Partners</a>
          </li>
          <li class="Nav-item">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1_748)">
              <rect width="32" height="32" rx="16" fill="#8A8A8E"/>
              <path d="M16.0001 5.9375C12.7209 5.9375 10.0626 8.59581 10.0626 11.875C10.0626 15.1542 12.7209 17.8125 16.0001 17.8125C19.2793 17.8125 21.9376 15.1542 21.9376 11.875C21.9376 8.59581 19.2793 5.9375 16.0001 5.9375Z" fill="white"/>
              <path d="M9.66675 20.9792C6.38756 20.9792 3.72925 23.6375 3.72925 26.9167V28.7981C3.72925 29.9907 4.59356 31.0076 5.7706 31.1998C12.5454 32.3059 19.4548 32.3059 26.2296 31.1998C27.4066 31.0076 28.2709 29.9907 28.2709 28.7981V26.9167C28.2709 23.6375 25.6126 20.9792 22.3334 20.9792H21.7937C21.5016 20.9792 21.2113 21.0254 20.9336 21.116L19.5632 21.5635C17.248 22.3195 14.7522 22.3195 12.4369 21.5635L11.0665 21.116C10.7888 21.0254 10.4986 20.9792 10.2065 20.9792H9.66675Z" fill="white"/>
              </g>
              <rect x="0.5" y="0.5" width="31" height="31" rx="15.5" stroke="#8A8A8E"/>
              <defs>
              <clipPath id="clip0_1_748">
              <rect width="32" height="32" rx="16" fill="white"/>
              </clipPath>
              </defs>
              </svg>
              
          </li>
          <!-- Example single danger button -->
<div class="btn-group">
<ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
</div>

        </ul>
      </div>
       
       
      </div>
    </nav>
    <script>
        $(document).ready(function () {

let slide=document.getElementById('slide')
slide.onclick=()=>{

  $('#sideM').slideToggle('fast', function() {
    mainM.classList.toggle('col-md-9')
    mainM.classList.toggle('col-md-12')
   mainM.classList.toggle('mainWidth')
   
  })
}});
    </script>