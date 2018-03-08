@extends('template')
@section('sadrzaj')
<!--<div style="margin-top: 200px">-->

 <!-- Portfolio Grid Section -->
<!--    <section id="team">-->
    <section id="portfolio" class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Aparati</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div style=" position: relative; right: 15px;">
                  <div style="width: " class="col-md-4 col-sm-6 portfolio-item apa">
                    <a href="{{url('primus')}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 500px;" src="{{asset('img/primus.jpg' )}}" class="img-responsive" alt="">
                    </a>
                      <a href="{{url('primus')}}">
                    <div class="portfolio-caption">
                        <h4>Primus</h4>
                        <p class="text-muted">pregledaj/ubaci pacijente na aparat</p>
                    </div>
                      </a>
                </div>
                <div style="width:  " class="col-md-4 col-sm-6 portfolio-item apa">
                    <a href="{{ url('oncor') }}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 500px;" src="{{asset('img/oncor.jpg' )}}" class="img-responsive" alt="">
                    </a>
                    <a href="{{ url('oncor') }}">
                    <div class="portfolio-caption">
                        <h4>Oncor</h4>
                        <p class="text-muted">pregledaj/ubaci pacijente na aparat</p>
                    </div>
                    </a>
                </div>
               
            
               
            </div>
           
            <div style=" position: relative; right: 15px;">
                  <div style="width: " class="col-md-4 col-sm-6 portfolio-item apa">
                    <a href="{{url('elekta1')}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 500px;" src="{{asset('img/elekta1.jpg' )}}" class="img-responsive" alt="">
                    </a>
                      <a href="{{url('elekta1')}}">
                    <div class="portfolio-caption">
                        <h4>Elekta 1</h4>
                        <p class="text-muted">pregledaj/ubaci pacijente na aparat</p>
                    </div>
                      </a>
                </div>
                <div style="width: " class="col-md-4 col-sm-6 portfolio-item apa">
                    <a href="{{url('elekta2')}}" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img style="height: 200px; width: 500px;" src="{{asset('img/elekta2.jpg' )}}" class="img-responsive" alt="">
                    </a>
                    <a href="{{url('elekta2')}}">
                    <div class="portfolio-caption">
                        <h4>Elekta 2</h4>
                        <p class="text-muted">pregledaj/ubaci pacijente na aparat</p>
                    </div>
                    </a>
                </div>
               
            
               
            </div>
           
        </div>
    
</section>
<div style="height: 500px;"></div>
@stop