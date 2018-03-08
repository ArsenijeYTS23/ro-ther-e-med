@extends('template')
@section('sadrzaj')
<!--<div style="margin-top: 200px">-->

 <!-- Portfolio Grid Section -->
<!--    <section id="team">-->
    <section id="portfolio" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Admin panel</h2>
                    <h3 class="section-subheading text-muted">Upravljaj aplikacijom</h3>
                </div>
            </div>
            <div style=" position: relative; right: 15px;">
                  <div style="width: 50%;" class="col-md-4 col-sm-6 portfolio-item">
                    <a href="{{url('administracija/dijagnoze')}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 500px;" src="{{asset('img/upisiDijagnoze.png' )}}" class="img-responsive" alt="">
                    </a>
                      <a href="{{url('administracija/dijagnoze')}}">
                    <div class="portfolio-caption">
                        <h4>Dijagnoze</h4>
                        <p class="text-muted">ubaci/izmeni dijagnozu</p>
                    </div>
                      </a>
                </div>
                <div style="width: 50%;" class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 500px;" src="{{asset('img/dodajDoktora1.png' )}}" class="img-responsive" alt="">
                    </a>
                    <a href="{{url('korisnici')}}">
                    <div class="portfolio-caption">
                        <h4>Korisnici</h4>
                        <p class="text-muted">upravljaj korisnicima</p>
                    </div>
                    </a>
                </div>
               
            
               
            </div>
           
        </div>
    
</section>
<div style="height: 500px;"></div>
@stop