@extends('layouts.app')
@section('content')
<script>
    var isHome = false;

</script>
<link rel="stylesheet" href="{{URL::asset('user/css/home.css')}}">
<link rel="stylesheet" href="{{URL::asset('user/css/new-style.css')}}">
<style>
    .who-w-r {
        background-image: url('{{URL::asset('user/img/white-bg.png')}}');
    }

    .contact-us {
        background-image: url('{{URL::asset('user/img/bg3.png')}}');
    }

    /* .our-brands {
        background-image: url('{{URL::asset('user/img/br.jpg')}}');
    } */

</style>

<!-- ======= Hero Section ======= -->

<div class="owl-carousel top-slider" data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="300"
     data-aos-offset="0">
    <div class="c-item c-main">
        <!-- <img class="bg-img" src=""> -->
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/bg.jpg')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-logo-parent">
            <img class="c-logo" src="{{URL::asset('user/img/logo.png')}}">
            <div>
                <h1>NAJIB EST, INC.</h1>
                <p style="text-align: center"> Shipping & Food distributed</p>
            </div>
        </div>
    </div>
    <div class="c-item c-main">
        <!-- <img class="bg-img" src=""> -->
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/bg77.jpg')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-logo-parent">
            <img class="c-logo" src="{{URL::asset('user/img/logo.png')}}">
            <div>
                <h1>NAJIB EST, INC.</h1>
                <p style="text-align: center"> Shipping & Food distributed</p>
            </div>
        </div>
    </div>
    <div class="c-item c-main">
        <!-- <img class="bg-img" src=""> -->
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/marketslide2.jpg')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-logo-parent">
            <img class="c-logo" src="{{URL::asset('user/img/logo.png')}}">
            <div>
                <h1>NAJIB EST, INC.</h1>
                <p style="text-align: center"> Shipping & Food distributed</p>
            </div>
        </div>
    </div>

    <div class="c-item c-main">
        <!-- <img class="bg-img" src="{{URL::asset('user/img/bg002.jpg')}}"> -->
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/bg66.jpg')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-logo-parent">
            <img class="c-logo" src="{{URL::asset('user/img/logo.png')}}">
            <div>
                <h1>NAJIB EST, INC.</h1>
                <p style="text-align: center"> Shipping & Food distributed</p>
            </div>
        </div>

    </div>

    <div class="c-item c-main">
        <!-- <img class="bg-img" src="{{URL::asset('user/img/bg002.jpg')}}"> -->
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/marketslide.jpg')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-logo-parent">
            <img class="c-logo" src="{{URL::asset('user/img/logo.png')}}">
            <div>
                <h1>NAJIB EST, INC.</h1>
                <p style="text-align: center"> Shipping & Food distributed</p>
            </div>
        </div>

    </div>
</div>
  <!-- End Hero -->

      <!-- ======= Clients Section ======= -->
      <section id="clients" class="clients section-bg">
      <div class="container-fluid" data-aos="zoom-in">

        <div class="row">

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-center justify-content-center">
            <a href="{{url('brandProducts/124')}}"><img src="{{asset('user/img/brands/laoadicia.png')}}" class="img-fluid" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-center justify-content-center">
            <a href="{{url('brandProducts/125')}}"><img src="{{asset('user/img/brands/alsham.png')}}" class="img-fluid" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-center justify-content-center">
            <a href="{{url('brandProducts/12')}}"><img src="{{asset('user/img/brands/shamra.png')}}" class="img-fluid" alt=""></a>
          </div>

          <div class="col-lg-3 col-md-6 col-6 d-flex align-items-center justify-content-center">
            <a href="{{url('brandProducts/5')}}"><img src="{{asset('user/img/brands/yara.png')}}" class="img-fluid" alt=""></a>
          </div>

        </div>

      </div>
    </section>
    <!-- End Clients Section -->

      <!-- New sevices Section -->
      <div id="services" class="services-area area-padding">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12" data-aos="fade-up">
            <div class="section-headline services-head text-center">
              <h2>Our Services</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-briefcase"></i>
                  </a>
                  <h4> IMPORT - EXPORT- AGENCIES</h4>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                  <i class="bi bi-basket"></i>
                  </a>
                  <h4> Food Distributed</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                  <i class="bi bi-bar-chart"></i>
                  </a>
                  <h4>Web Site Management</h4>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                  <i class="fas fa-shipping-fast"></i>
                  </a>
                  <h4> Shipping</h4>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                  <i class="bi bi-code-slash"></i>
                  </a>
                  <h4> Web Design & Development</h4>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                  <i class="bi bi-badge-ad"></i>
                  </a>
                  <h4> Advertising-Propaganda</h4>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                  <i class="bi bi-globe"></i>
                  </a>
                  <h4> Domain Name Registration</h4>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                  <i class="bi bi-search"></i>
                  </a>
                  <h4> Sampling</h4>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>

          <div class="col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                  <i class="bi bi-box-seam"></i>
                  </a>
                  <h4>Packaging</h4>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>

          <div class="col-12 col-md-12 aos-init aos-animate" data-aos="fade-up">
         <button class="services-button">Learn more!</button>
          </div>


        </div>
      </div>
    </div>
    <!-- End Services Section -->
    <!-- Product Slider -->
<section id="team" class="team section-bg">
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="container-fluid">

  <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Food Products</h2>
            </div>
          </div>
        </div>

    <div class="row my-cards owl-carousel">
        
    <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="https://najibest.wenfee.com/storages/images/products/SWLA009.jpg" class="img-fluid" alt="">

              </div>
              <div class="member-info">
                <h4>LAODICEA</h4>
                <span>Anise Seeds Cookies</span>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="https://najibest.wenfee.com/storages/images/products/NUTAY005.jpg" class="img-fluid" alt="">

              </div>
              <div class="member-info">
                <h4>YARA</h4>
                <span>Almonds Blanched Whole</span>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="https://najibest.wenfee.com/storages/images/products/NUTCS007.jpg" class="img-fluid" alt="">

              </div>
              <div class="member-info">
                <h4>SHAMRA</h4>
                <span>Chick Peas White Roasted Unsalted</span>
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="https://najibest.wenfee.com/storages/images/products/BABA001.jpg" class="img-fluid" alt="">

              </div>
              <div class="member-info">
                <h4>AL SHAM</h4>
                <span>Baba Ghanoush</span>
              </div>
            </div>
          </div>


      

      

      

      
      
    </div>
  </div>
</section>
<!-- Product Slider -->


<div class="our-brands" data-aos="fade-up">
<div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Other Brands</h2>
            </div>
          </div>
        </div>
        <div class="o-brands-parent owl-carousel">
        <div class="brand-parent">
            <a href="{{url('brandProducts/65')}}">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/ChefRamzi.png')}}')"></div>

                <div class="b-name-parent">
                    <p>CHEF RAMZI</p>
                </div>
            </a>
        </div>
        <div class="brand-parent">
            <a href="{{url('brandProducts/2')}}">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/cortas.png')}}')"></div>

                <div class="b-name-parent">
                    <p>CORTAS</p>
                </div>
            </a>
        </div>
        <a href="{{url('brandProducts/91')}}">
            <div class="brand-parent">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/alamira.png')}}')"></div>

                <div class="b-name-parent">
                    <p>AL AMIRA </p>
                </div>
            </div>
        </a>
        <a href="{{url('brandProducts/66')}}">
            <div class="brand-parent">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/rimta.png')}}')"></div>

                <div class="b-name-parent">
                    <p>RIMTA </p>
                </div>
            </div>
        </a>
        <a href="{{url('brandProducts/23')}}">
            <div class="brand-parent">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/krinos.png')}}')"></div>

                <div class="b-name-parent">
                    <p>KRINOS </p>
                </div>
            </div>
        </a>
        <a href="{{url('brandProducts/92')}}">
            <div class="brand-parent">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/saifan.png')}}')"></div>

                <div class="b-name-parent">
                    <p>SAIFAN </p>
                </div>
            </div>
        </a>
        <a href="{{url('brandProducts/33')}}">
            <div class="brand-parent">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/najjar.png')}}')"></div>

                <div class="b-name-parent">
                    <p>NAJJAR </p>
                </div>
            </div>
        </a>
        <a href="{{url('brandProducts/97')}}">
            <div class="brand-parent">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/loumidis.png')}}')"></div>

                <div class="b-name-parent">
                    <p>LOUMIDIS </p>
                </div>
            </div>
        </a>
        <a href="{{url('brandProducts/59')}}">
            <div class="brand-parent">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/minerva.png')}}')"></div>

                <div class="b-name-parent">
                    <p>MINERVA </p>
                </div>
            </div>
        </a>
        <a href="{{url('brandProducts/34')}}">
            <div class="brand-parent">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/bravo.png')}}')"></div>

                <div class="b-name-parent">
                    <p>BRAVO </p>
                </div>
            </div>
        </a>

    </div>
</div>




@push('page_scripts')
<script>
    $(document).ready(function () {
        $(".my-cards").owlCarousel({
            loop: true,
            items: 2,
            nav: true,
            autoplay: false,
            autoplayTimeout: 5000,
            responsive: {

                0: {
                    items: 1
                },
                1000: {
                    items: 4
                }
        }
    })


        $(".top-slider").owlCarousel({
            loop: true,
            items: 1,
            nav: true,
            autoplay: true,
            autoplayTimeout: 10000,

        })

        $(".top-slider2").owlCarousel({
            loop: true,
            items: 1,
            nav: true,
            autoplay: true,
            autoplayTimeout: 11000,

        })

        $(".o-brands-parent").owlCarousel({
            loop: false,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                550: {
                    items: 2
                },
                700: {
                    items: 4
                }
            }
        })
        foodSliderInit();

        $(window).on('resize', function () {
            foodSliderInit();
        });
        
    });

    function foodSliderInit(){
        $(".food-slider-parent").html($(".food-s-temp").html());

        $(".food-slider-parent .food-slider").owlCarousel({
            loop: true,
            nav: true,
            autoplay: true,
            autoplayTimeout:2000,
            autoplayHoverPause:false,
            responsive: {
                0: {
                    items: 2
                },
                550: {
                    items: 2
                },
                700: {
                    items: 4
                }
            }
        })
    }
    
    $(".learn-more-list a").click(function () {
        $(".lm-active").removeClass("lm-active");
        $(this).addClass("lm-active");

        var tt = $(this).attr("data-t");

        $(".lm-text-active").fadeOut(200, function(){
            $(".lm-text-active").removeClass("lm-text-active");
            $(tt).fadeIn(200);
            $(tt).addClass("lm-text-active");
        });
    });

$(".first-lm").click();



</script>
@endpush
@endsection
