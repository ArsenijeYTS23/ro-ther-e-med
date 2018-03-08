<?php
if(isset(explode('/',Request::url())[5])){
  $r=(explode('/',Request::url())[5]);
}
?>

<!DOCTYPE html>

<html lang="en" ng-app="myApp">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-animate.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
    <!-- Bootstrap Core CSS -->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">  <!--  surce za datepicker  -->
    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->

  <!-- Theme CSS -->
    <link href="{{asset('css/agency.min.css')}}" rel="stylesheet">
 <script src="{{asset('js/mojAjax.js')}}"></script>
 <script src="{{asset('js/mojJs.js')}}"></script>
 <script src="{{asset('js/ng_controllers/mainController.js')}}"></script>
 <script src="{{asset('js/ng_controllers/customersController.js')}}"></script>
 <script src="{{asset('js/ng_controllers/aparatiController.js')}}"></script>
 <script src="{{asset('js/ng_services/dbService.js')}}"></script>

 <script type="text/javascript">
         var urlo = "{{ url('/') }}";
    
   // alert(url);
    $(function() {

  // demo dropdown 1 ---------------------------------------------------------
//  $("#demo_drop1").jui_dropdown({
//    launcher_id: 'launcher1',
//    launcher_container_id: 'launcher1_container',
//    menu_id: 'menu1',
//    containerClass: 'container1',
//    menuClass: 'menu1',
//    onSelect: function(event, data) {
//      $("#result").text('index: ' + data.index + ' (id: ' + data.id + ')');
//    }
//  });
//   $("#toggle_mouseenter").click(function() {
//
//    var flag = $(this).is(":checked");
//
//    $("#demo_drop1").jui_dropdown({
//      launchOnMouseEnter: flag
//    });
//  });
//
});

  </script>

  <style>
      .apa {
        width: 100%;
    }
  @media screen and (min-width: 770px) {
    .apa {
        width: 50%;
    }
  }
  </style>

<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #03171799;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>




</head>

<body id="page-top" class="index" style="background: #ecebe0;" >

    <!-- Navigation -->
    <nav style="background:gray;" id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a  class="navbar-brand page-scroll" href="{{url('/')}}">Pocetna strana</a>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
<!--                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>-->

                    <li class="dropdown" <?php if(isset($r) && $r=='lista'){ echo "class='active'";} else{ echo "";} ?> >
<!--                        <a class="page-scroll" href="{{url('lista')}}">Liste pacijenata</a>-->

                              <a  href="{{url('lista')}}" class=" page-scroll">Liste pacijenata</a>
                              @if(isset($r) && $r=='test_aparati')
                                   <div class="dropdown-content">
                                     <a href="{{url('test')}}">Svi pacijenti</a>
                                     <a href="{{url('test#!/2')}}">Lista cekanja</a>
                                     <a href="{{url('test#!/3')}}">Pacijenti u proceduri</a>
                                     <a href="{{url('test#!/4')}}">Pacijenti na zracenju</a>
                                   </div>
                              @endif


                    </li>


                    <li id="dodajPacijenta" <?php if(isset($r) && $r=='dodaj'){ echo "class='active'";} else{ echo "";} ?> >
                        <a   class="page-scroll" href="#">Dodaj pacijenta</a>
                    </li>

                    <li class="dropdown" <?php if(isset($r) && ($r=='aparati' || $r=='primus' || $r=='oncor' )){ echo "class='active'";} else{ echo "";} ?> >
<!--                        <a class="page-scroll" href="{{url('aparati')}}">Aparati</a>-->
                                      <a  href="{{url('lista')}}" class=" page-scroll">Aparati</a>
                                        @if(isset($r) && $r=='test')
                                   <div  class="dropdown-content">
                                     <a href="{{url('test_aparati')}}">Primus</a>
                                     <a href="{{url('test_aparati#!/2')}}">Oncor</a>
                                     <a href="{{url('test_aparati#!/3')}}">Elekta1</a>
                                     <a href="{{url('test_aparati#!/4')}}">Elekta2</a>
                                   </div>
                                        @endif




                    </li>
                    <li <?php if(isset($r) && $r=='doktori'){ echo "class='active'";} else{ echo "";} ?> >
                        <a class="page-scroll" href="{{url('doktori')}}">Doktori</a>
                    </li>
                    <li>
                        @if(Auth::guest())
                        <a class="page-scroll" href="{{url('login')}}">Login</a>
                        @else
                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        @endif

                    </li>
                     @if(!Auth::guest())
                    <li id="izmeniFoto" value="{{ Auth::id() }}" style="margin-left:29px;">
                        @if(\File::exists("profile/".Auth::id()))
              <a style="margin:0; padding: 0px;"  href="#">  <img class="img-circle" width="60px" src="{{ asset('profile/'.Auth::id().'/'.Auth::id().'.jpg') }}"  alt="555"></a>
                    @else
                        <a style="margin:0; padding: 0px;"  href="#">  <img class="img-circle" width="80px" src="{{ asset('user/pcqreK5Xi.jpg') }}"  alt="555"></a>
                   @endif
                    </li>
                    @endif

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->

    <!-- Services Section -->
