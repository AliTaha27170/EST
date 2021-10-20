@extends('layouts.app')
@section('content')
<script>
    var isHome = false;

</script>
<link rel="stylesheet" href="{{URL::asset('user/css/home.css')}}">
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

<div class="owl-carousel top-slider">
    <div class="c-item c-main">
        <!-- <img class="bg-img" src=""> -->
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/slider2.png')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-logo-parent">
            <img class="c-logo" src="{{URL::asset('user/img/logo.png')}}">
            <div>
                <h1>NAJIB EST, INC.</h1>
                <p> Prosperity & Development Economical Group</p>
            </div>
        </div>
    </div>
    <div class="c-item c-main">
        <!-- <img class="bg-img" src="{{URL::asset('user/img/bg3.jpg')}}"> -->
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/slider1.png')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-content">
            <h1>Advertising-Propaganda <p></p> & Web Design</h1>
        </div>
    </div>

    <div class="c-item c-main">
        <!-- <img class="bg-img" src="{{URL::asset('user/img/bg002.jpg')}}"> -->
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/truck2.jpg')}}')"></div>
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
        <div class="bg-img" style="background-image:url('{{URL::asset('user/img/bgg.png')}}')"></div>
        <div class="bg-filter"></div>
        <div class="c-logo-parent">
            <img class="c-logo" src="{{URL::asset('user/img/logo.png')}}">
            <div>
                <h1>NAJIB EST, INC.</h1>
                <p style="text-align: center">Get the best food products from our website</p>
            </div>
        </div>

    </div>
</div>

<p><br></p>


<div class="o-services">
    <h1>OUR SERVICES</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="ser-item">
                    <span class="fa fa-globe"></span>
                    <label>IMPORT - EXPORT- AGENCIES</label>
                    <p>Food Import and Export Is Our Major Specialization. Transferring the Foods between Different Countries and Offering the Top High Quality. Najib Est Provides Import and Export Services to All Customers in the fastest Time and the best cost.  Customers Satisfaction Is the Main Target Behind the Excellence in Our Service.
                        A Specialized Department in Import and Export Is Available.
                        For More Information, Please Contact Us in order to Let You Meet the Responsible Person.
                        
                    </p>

                </div>
            </div>

            <div class="col-md-6">
                <div class="ser-item">
                    <span class="fa fa-cutlery"></span>
                    <label>Food Distributed</label>
                    <p>
                        Najib Est is One of the Largest Companies World Wild. Providing the Customers in and out America with the Best Quality of European and Arabic Food Products. Offering the Highest Quality Standards in order to Ensure the Safety of the Food Products. The Best Services Are Always Available.
                        For More Information, Please Contact Us in order to Let You Meet the Responsible Person.

                    </p>

                </div>
            </div>

            <div class="col-md-6">
                <div class="ser-item">
                    <span class="fa fa-archive"></span>
                    <label>Packaging</label>
                    <p>Production Lines to Food Packaging within the Required Sanitary Conditions and Standards Are Available. Ensuring the Cleanliness and Safety of Fresh Food.
                        There is Professional Packaging for Variant Companies under Their Names or Our Name.
                        For More Information, Please Contact Us in order to Let You Meet the Responsible Person.
                        
                    </p>

                </div>
            </div>

            <div class="col-md-6">
                <div class="ser-item">
                    <span class="fa fa-truck"></span>
                    <label>Shipping</label>
                    <p>Providing on-Time Express Shipping Services for Customers in Any State or Country in and outside America. Get A Safety Shipping Process by Land or Sea.
                        To Get More Information Send Us an Email or Call us on The Phone Numbers of Our Company. 
                        
                        </p>

                </div>
            </div>
            
            <div class="col-md-6">
                <div class="ser-item">
                    <span class="fa fa-magic"></span>

                    <label>Web Design & Development</label>
                    <p>Najib Establishment is Concerned in all the important details of creating Your Own website. Offering the Best Available and Used Techniques in Order to Make the Website More Useful and Effective for Your Customer. 
                        This Service is Available Even after the Finish of Website Creating.
                        For More Information, Please Contact Us in order to Let You Meet the Responsible Person.
                        
                        </p>

                </div>
            </div>
            
            
            <div class="col-md-6">
                <div class="ser-item">
                    <span class="fa fa-newspaper-o"></span>

                    <label>Advertising-Propaganda</label>
                    <p>A High Level of Marketing Services Are Available. Promote Your Business and Your Brands, and Get the Most Attractive Advertisement with Us.
                        For more information, you can visit our offices or through pressing on "Contact Us" link.
                        
                    </p>

                </div>
            </div>
            <div class="col-md-6">
                <div class="ser-item">
                    <span class="fa fa-internet-explorer"></span>

                    <label>Domain Name Registration</label>
                    <p>Reserve Your Domain Name with Us, and Register the Brand under Your Own Name.
                        For More Information, Please Contact Us in order to Let You Meet the Responsible Person.
                        </p>

                </div>
            </div>

            
            <div class="col-md-6">
                <div class="ser-item">
                    <span class="fa fa-search"></span>
                    <label>Sampling</label>
                    <p>High Quality Sampling Is Applied to Represent Your Product Well.
                        For More Information, Please Contact Us in order to Let You Meet the Responsible Person.
                        </p>

                </div>
            </div>
            <div class="col-md-12">
                <div class="ser-item">
                    <span class="fa fa-cogs"></span>

                    <label>Web Site Management</label>
                    <p>Najib Est always Provides the Customers with the Highest Quality Products, the Developed Techniques, and the Most Advanced Pages Displaying and Designing. The process of buying and selling through our websites, is so easy and facilitated. Paying Attention to the Smallest Things and Details, Dates Respecting, Credibility at Work and the Constant Seeking to Serve the Customers Are Our Main Targets. Our Websites are the Most Functional and Credible Sites
                        You are in the convenient place. Najib Est has A Professional Academic Team, Works According to The Highest Standards of Advertising Technology and Marketing. 
                        For More Information, Please Contact Us in order to Let You Meet the Responsible Person.
                        
                        </p>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="food-s-temp" hidden>
    <div class="owl-carousel food-slider">

        @foreach($products as $product)
        <div class="food-item">
            <img src="{{asset('storages/images/products/'.$product->image)}}" alt="">
        </div>
        @endforeach

    </div>
</div>

<div class="food-slider-tail">Our Food Products</div>
<div class="food-slider-section" style="background-image:url('{{asset('user/img/foodbg.png')}}')">
    <div class="f-title">
        our <br> food <br> products
    </div>

    <div class="food-slider-parent">


    </div>
</div>

<div class="our-brands">
    <h1>OUR FOODS BRANDS</h1>
    <div class="o-brands-parent owl-carousel">
        <div class="brand-parent">
            <a href="{{url('brandProducts/5')}}">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/yara.png')}}')"></div>
                <!-- <img src="{{asset('user/img/yara.jpg')}}" alt=""> -->
                <div class="b-name-parent">
                    <p>YARA</p>
                </div>
            </a>
        </div>
        <div class="brand-parent">
            <a href="{{url('brandProducts/12')}}">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/shamra.png')}}')"></div>
                <!-- <img src="{{asset('user/img/shamra.png')}}" alt=""> -->
                <div class="b-name-parent">
                    <p>SHAMRA</p>
                </div>
            </a>
        </div>
        <div class="brand-parent">
            <a href="{{url('brandProducts/125')}}">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/alsham.png')}}')"></div>
                <!-- <img src="{{asset('user/img/alsham.png')}}" alt=""> -->
                <div class="b-name-parent">
                    <p>AL SHAM </p>
                </div>
            </a>
        </div>
        <div class="brand-parent">
            <a href="{{url('brandProducts/124')}}">
                <div class="b-bg-img" style="background-image:url('{{asset('user/img/brands/laoadicia.png')}}')"></div>
                <!-- <img src="{{asset('user/img/laodicea.jpg')}}" alt=""> -->
                <div class="b-name-parent">
                    <p>LAODICEA</p>
                </div>
            </a>
        </div>
    </div>
</div>

<img style="width: 100%;" src="{{url('user/img/splash.png')}}" alt="">

<div class="our-brands">
    <h1>OTHER BRANDS</h1>
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

</script>
@endpush
@endsection
