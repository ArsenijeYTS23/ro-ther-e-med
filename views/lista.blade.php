@extends('template')
@section('sadrzaj')
<!--<div style="margin-top: 200px">-->

 <!-- Portfolio Grid Section -->
<!--    <section id="team">-->
    <section id="portfolio" ng-controller="customersCtrl1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Liste pacijenata</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div style=" position: relative; right: 15px;">
                  <div style="" class="col-md-4 col-sm-6 portfolio-item ">
                    <a href="{{url('lista/svi_pacijenti')}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{asset('img/svi_pacijenti.png' )}}" class="img-responsive" alt="">
                    </a>
<!--                      <a href="" ng-click="urlnew()">-->
                      <a href="{{url('lista/svi_pacijenti')}}">
                    <div class="portfolio-caption">
                        <h4>Lista svih pacijenata</h4>
                        <p class="text-muted">svi pacijenti</p>
                    </div>
                      </a>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item ">
                    <a href="{{url('lista/pacijenti_u_proceduri')}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 400px;" src="{{asset('img/procedura.png' )}}" class="img-responsive" alt="">
                    </a>
                     <a href="{{url('lista/pacijenti_u_proceduri')}}">
                    <div class="portfolio-caption">
                        <h4>Pacijenti u proceduri</h4>
                        <p class="text-muted">Obradjeni za zracenje a nisu poceli</p>
                    </div>
                     </a>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="{{url('lista/lista_cekanja')}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 400px;" src="{{asset('img/cekanje.jpg' )}}" class="img-responsive" alt="">
                    </a>
                     <a href="{{url('lista/lista_cekanja')}}">
                    <div class="portfolio-caption">
                        <h4>Lista cekanja</h4>
                        <p class="text-muted">Pacijenti koji nisu obradjeni</p>
                    </div>
                     </a>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="{{url('lista/pacijenti_na_zracenju')}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 400px;" src="{{asset('img/na_aparatu.png' )}}" class="img-responsive" alt="">
                    </a>
                     <a href="{{url('lista/pacijenti_na_zracenju')}}">
                    <div class="portfolio-caption">
                        <h4>Na zracenju</h4>
                        <p class="text-muted">Pacijenti koji se trenutno zrace</p>
                    </div>
                     </a>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 400px;" src="{{asset('img/arhiva.jpg' )}}" class="img-responsive" alt="">
                    </a>
                     <a href="{{url('arhiva')}}">
                    <div class="portfolio-caption">
                        <h4>Arhiva</h4>
                        <p class="text-muted">arhiva</p>
                    </div>
                     </a>
                </div>
            </div>
           
        </div>
    
</section>
<div style="height: 500px;"></div>
@stop