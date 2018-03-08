@extends('template')
@section('sadrzaj')
 <section id="servicesa">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Radioterapija</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                   <a href="{{ url('lista') }}"> 
                        <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-group fa-stack-1x fa-inverse"></i>
                        
                    </span>
                    
                    <h4 class="service-heading">Liste pacijenata</h4>
                    <p class="text-muted">Lista cekanja.. Obradjeni pacijenti.. Pacijenti na zracenju.. Arhiva..</p>
              </a>
                </div>
                <div class="col-md-4">
                   <a href="{{ url('doktori') }}">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                       <i class="fa fa-user-md fa-stack-1x fa-inverse" aria-hidden="true"></i>

                    </span>
                        <h4 class="service-heading">Lista doktora</h4>
                    <p class="text-muted"></p>
                    </a>
                </div>
                <div class="col-md-4">
                      <a href="{{ url('aparati') }}">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-heartbeat fa-stack-1x fa-inverse" aria-hidden="true"></i>
                    </span>
                    <h4 class="service-heading">Aparati</h4>
                    <p class="text-muted">Primus.. Oncor.. Elekta1.. Elekta2..</p>
                      </a>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                     <img style="height: 200px; width: 500px;" src="{{asset('img/bosk.jpg' )}}" class="img-responsive" alt="">
                   </div>
<!--                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-stethoscope fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">E-Commerce</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>-->
<!--                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-pencil-square-o fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Responsive Design</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>-->
<!--                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-sign-in fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>-->
                <a href="{{url('administracija')}}"> 
                    <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-desktop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Administracija</h4>
                    <p class="text-muted">Upravljaj aplikacijom</p>
                    </div> </a>
                   <div class="col-md-4">
                    <img style="height: 200px; width: 500px;" src="{{asset('img/radit.jpg' )}}" class="img-responsive" alt=""> </div>
            </div>
        </div>
    </section>
@stop