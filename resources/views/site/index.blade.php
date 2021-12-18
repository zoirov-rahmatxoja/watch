
@extends('layouts.app')

@section('content')
    <!-- preloader -->
    <div id="loading">
        <div class="spinner-grow text-success" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- scroll to top -->
    <a class="scroll-to-top" href="" style="display: none">
        <i class="fa fa-arrow-up"></i>
    </a>

    <!-- header area start -->
   
    </header>
    <!-- header area end -->

    <!-- main content area start -->
    <main>
        <!-- hero area start -->
        <section id="home" class="hero-area position-relative" data-background="assets/img/hero/hero-bannar.png">
            <div class="hero-shape">
                <img class="spahe hs-1 rotateit" src="assets/img/shape/cross.png" alt="">
                <img class="spahe hs-2 rotateit-r" src="assets/img/shape/squar.png" alt="">
                <img class="spahe hs-3 rotateit-r" src="assets/img/shape/cross.png" alt="">
            </div>
            <div class="hero-slider">
                <div class="single-slider">
                    <div class="container">
                    @foreach($start as $str)
                        <div class="row">
                          
                            <div class="col-lg-5 col-md-6">
                                <div class="slider-content">
                                    <h5>60% offer get now</h5>
                                    <h2>{{ $str->{ 'title_'. $locale} }}</h2>
                                    <p>{!!$str->{'text_'.$locale }!!}</p>
                                    <div class="hero-btn">
                                        <a href="#" class="btn">Add to Cart <i class="fa fa-cart-arrow-down"></i></a>
                                        <span>Only $69.00</span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-lg-7 col-md-6">
                                <div class="slider-img text-center">
                                    <img class="updown-it" src="{{ asset('storage/' . $str->image ) }}" alt="">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- hero area end -->

        <!-- best collection start -->
        <section id="best-collection" class="best-collection pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-70">
                            <span>Best Collection</span>
                            <h2>Our product quality</h2>
                            <h1>smart watch</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                   @foreach($watch as $watch) 
                   <div class="col-lg-4 col-md-6">
                        <div class="single-bc text-center mb-30">
                            <div class="bc-img">
                                <img src="assets/img/product/best-collecttion/1.png" alt="">
                            </div>
                            <div class="bc-info">
                                <h4>{{ $watch->{'title_' . $locale } }}</h4>
                                <p><i class="fa fa-check"></i>{{ $watch->{'text_1_' . $locale } }}</p>
                                <p><i class="fa fa-check"></i>{{ $watch->{'text_2_' . $locale } }}</p>
                            </div>
                            <a href="#" class="btn btn-t mt-15">Order & Detail</a>
                        </div>
                    </div>
                    @endforeach
                  
                    
                    </div>
                </div>
            </div>
        </section>
        <!-- best collection end -->

        <!-- about area start -->
        <section id="about" class="about-area position-relative pt-100 pb-100" data-background="assets/img/about/about-bg.png">
            <div class="shape-group">
                <img class="spahe abs-1" src="assets/img/about/moon-shape.svg" alt="">
                <img class="spahe abs-2" src="assets/img/about/r-moon-shape.svg" alt="">
                <img class="spahe abs-3" src="assets/img/about/triangle-dots.svg" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        @foreach($future as $fut)
                        <div class="about-img">
                            <img class="updown-it" src="{{ asset('storage/' . $fut->image ) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="col-xl-7">



                        <div class="about-content">
                            <h5>About our products</h5>
                            <h2>Aobout the Bmarket. We have <span>lunced in</span> 2020 Making the future.</h2>
                            @foreach($future as $fut)
                            <p>{!!$fut->{'text_'.$locale }!!}</p>
                            @endforeach

                            @foreach($about as $abt)
                            <ul>
                                <li><i class="fa fa-check"></i>{{ $abt->{'text_'.$locale } }}</li>
                               
                            </ul>

                            @endforeach
                            <a class="btn btn-t" href="#">Know More</a>
                        </div>


                        
                    </div>
                </div>
            </div>
        </section>
        <!-- about area end -->

        <!-- services area start -->
        <section id="services" class="services-area pt-100 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-70">
                            <span>Features & Facilities</span>
                            <h2>All features of smartwatch</h2>
                            <h1>Product Features</h1>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                @foreach($feat as $feat)

                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="single-service mb-60">
                            <div class="service-icon-wrapper">
                                <div class="service-icon">
                                    <img src="{{ asset('storage/' . $feat->image ) }}" alt="">
                                </div>
                            </div>

                            <div   class="service-content">
                                <h2 >{{ $feat->{'title_'.$locale } }}</h2>
                                <p >{!! $feat->{'text_'.$locale }!!}</p>
                               
                            </div>
                           



                        </div>
                    </div>
                   
                    @endforeach
                   
                </div>
            </div>
        </section>
        <!-- services area end -->

        <!-- video area start -->
        <section class="play-area pt-100 pb-100" data-background="assets/img/play/video-bg.svg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title st-2 text-center">
                            <span class="text-white mb-30">How we are perfect for selling watch</span>
                            <h2 class="text-white">Video presentation</h2>
                        </div>
                        @foreach($video as $vid)
                        <div class="bplay-btn text-center">
                            <a href="{{ $vid->link }}" class="border-style mfp-iframe v-play">
                                <div class="border-outer">
                                    <div class="border-inner">
                                        <div class="play-btn">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- video area end -->

        <!-- feature product area start -->
        <section id="products" class="feature-product-area position-relative pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-70">
                            <span>Featured</span>
                            <h2>Our featured product</h2>
                            <h1>Featured Product </h1>
                        </div>
                    </div>
                </div>
                
               
                <div class="row">
              
                    <div class="col-12">
                   
                        <div class="feature-slider owl-carousel">

                        @foreach($product as $pro)
                            <div class="single-feature-slider text-center">
                                <h4>Glorious</h4>
                                <div class="feature-slider-img">
                                    <img src="{{ asset('storage/' . $pro->image ) }}" alt="">
                                </div>
                                <div class="feature-pro-info">
                                    <span>{{ $pro-> cost }}</span>
                                    <h5>{{ $pro-> name }}</h5>
                                    <a href="" class="btn btn-t">Buy now</a>
                                </div>
                            </div>
                            @endforeach
                            




                            
                                </div>
                               

                            </div>
                           
                        </div>

                   
                    </div>
                </div>
            </div>
        </section>
        <!-- feature product area end -->

        <!-- facilities area start -->
        <section class="facility pt-100 pb-70"  data-background="assets/img/bg/facility-bg.svg">
            <div class="container">
                <div class="row">
                @foreach($services as $ser)
                    <div class="col-lg-4 col-md-6">

                     

                        <div class="single-ext-fea text-center mb-30">
                            <div class="ext-f-icon">
                                <img src="{{ asset('storage/' . $ser->image ) }}" alt="">
                            </div>
                            <h4>{{ $ser->{'title_'.$locale } }}</h4>
                            <p>{!!$ser->{'text_'.$locale }!!}</p>
                        </div>

                      

                    </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- facilities area end -->

        <!-- feature product 2 start -->
        <section class="f-p-area-2 position-relative pt-100 pb-70" data-background="assets/img/bg/team-bg.png">
            <div class="two-circle-shape bigsmall-it"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-70">
                            <span>Popular</span>
                            <h2>Popular Product</h2>
                            <h1>Popular product</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($popular as $pop)

                    <div class="col-lg-4 col-md-6">
                        <div class="single-bc fp-2 text-center mb-30">
                            <div class="bc-img-2">
                                <img src="{{ asset('storage/' . $pop->image ) }}" alt="">
                                <div class="triangle-shape"></div>
                            </div>
                            <div class="bc-info">
                                <h4>{{ $pop->{ 'title_'. $locale} }}</h4>
                                <p><i class="fa fa-check"></i> {!!$pop->{'text_1_'.$locale }!!}</p>
                                <p><i class="fa fa-check"></i> {!!$pop->{'text_2_'.$locale }!!}</p>
                            </div>
                            <a href="#" class="btn">Order & Detail</a>
                        </div>
                    </div>

                    @endforeach

                   
                </div>
            </div>
        </section>
        <!-- feature product 2 end -->

        <!-- testimonial area start -->
        <section class="testimonial-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-90">
                            <span>Testimonial</span>
                            <h2>What say our customert</h2>
                            <h1>Client says</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
               
                    <div class="col-xl-12">


                        <div class="b-testimonial owl-carousel">

                        @foreach($client as $cli)
                            <div class="single-testimonial">
                          
                                <div class="quote-icon">
                                    <i class="fa fa-quote-right"></i>
                                </div>


                                <div class="usr-img">
                                    <img src="{{ asset('storage/' . $cli->image ) }}" alt="">
                                </div>

                                
                             
                                <div class="usr-content">
                                    <h2>{{ $cli->name  }}</h2>
                                    <h3>{{ $cli->company  }}</h3>
                                    <p>{!!$cli->{'text_'.$locale }!!}</p>
                                    <div class="user-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                    </div>
                                </div>
                              
                              
                            </div>
                            @endforeach
                        


                          
                           
                          
                          
                        </div>
                     
                    </div>
                 
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- faq area start -->
        <section id="faq" class="faq-area pt-100 pb-100"  data-background="assets/img/bg/faq.png">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center mb-70">
                            <span>FAQs</span>
                            <h2>Some important Q & A</h2>
                            <h1>product Faqs</h1>
                        </div>
                    </div>
                </div>


            
                <div class="row">
                    <div class="col-lg-4">
                        <div class="faq-img text-center">
                            <img class="updown-it" src="assets/img/faqs/1.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8">
                    
                        <div class="faq-wrraper">
                        
                            <div id="accordionExample">
                            @foreach($faqs as $faqs)
                              <div class="card">
                                <div class="card-header" id="headingOne">
                                  <h2 class="mb-0">
                                    <a href="#" class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    {{ $faqs->{ 'title_'. $locale} }}
                                    </a>
                                  </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                  <div class="card-body">
                                  {!!$faqs->{'text_'.$locale }!!}
                                  </div>
                                 
                                </div>
                              </div>
                              @endforeach
                              
                              </div>
                             
                            </div>
                        </div>
                    </div>
                  




                </div>
            </div>
        </section>
        <!-- faq area end -->

        <!-- contact area start -->
        <section id="contact" class="contact-area pt-100 pb-100">
            <div class="container">
                <div class="col-12">
                    <div class="section-title text-center mb-70">
                        <span>Fast Replay</span>
                        <h2>Contact us</h2>
                        <h1>Send message</h1>
                    </div>
                </div>
                <div class="row">

                @foreach($info as $info)
                    <div class="col-xl-5">



                        <div class="contact-info">
                            <div class="contact-head mb-60">
                                <h2>Contact information</h2>
                                <p>Quibusdam assumenda volutpat purus mollitia autem xercitationem?</p>
                            </div>
                            <div class="single-contact">
                               <div class="contact-icon">
                                   <i class="fa fa-envelope"></i>
                               </div>
                               <div class="single-contact-info">
                                   <h3>Email address</h3>
                                   <a >{{ $info->email }}</a>
                               </div>
                            </div>
                            <div class="single-contact">
                               <div class="contact-icon">
                                   <i class="fa fa-phone"></i>
                               </div>
                               <div class="single-contact-info">
                                   <h3>Phone number</h3>
                                   <a class="mr-2" >{{ $info->phone }}</a>
                                   <a >{{ $info->phone }}</a>
                               </div>
                            </div>
                            <div class="single-contact">
                               <div class="contact-icon">
                                   <i class="fa fa-map-marker"></i>
                               </div>
                                   <div class="single-contact-info">
                                   <h3>Location</h3>
                                   <a href="">{{ $info->address }}</a>
                               </div>
                            </div>
                        </div>
                    </div>


                    @endforeach
                    <div class="col-xl-7">
                        <div class="contact-form-wrapper">

                        <form id="ttm-contactform" class="ttm-contactform wrap-form clearfix" action="{{ route('contact.send') }}" method="POST"  enctype="multipart/form-data" action="#">              
                             @csrf
                  <input class="contact-form-wrapper"  type="text" autocomplete="off" name="name"class="contact-form-wrapper" id="name" placeholder="Name*" required>
                
                
                  <input   class="contact-form-wrapper" id="phone" autocomplete="off" data-inputmask="'mask': '+\\9\\9\\8 (99) 999-99-99'"  type="phone" name="phone" required placeholder="Phone Number *">      

                  <input   type="text" autocomplete="off" name="subject"class="contact-form-wrapper" id="subject" placeholder="Your direction*" required>

                  <fieldset>
                    <textarea   name="message" type="text" class="contact-form-wrapper" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>
                  </fieldset>
                                    <button class="btn btn-t m-0" type="submit">Send message</button>
                                    <span class="form-message text-center d-block mt-2"></span>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact area end -->

    </main>
    <!-- main content area end -->

    <!-- footer area start -->
    
    <!-- footer area end -->

    <!-- JS -->
@endsection