@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{URL::asset('user/css/services.css')}}">
<section class="service-details">
      <div class="container">

      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12" data-aos="fade-up">
            <div class="section-headline services-head text-center">
              <h2>Our Services</h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
                <img src="{{URL::asset('user/img/service-details-1.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Food Distributed</h5>
                <p class="card-text">Najib Est Is One Of The Largest Companies World Wild. Providing The Customers In And Out America With The Best Quality Of European And Arabic Food Products. Offering The Highest Quality Standards In Order To Ensure The Safety Of The Food Products. The Best Services Are Always Available.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
              <img src="{{URL::asset('user/img/web-design.png')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Web Design & Development</h5>
                <p class="card-text">Najib Establishment Is Concerned In All The Important Details Of Creating Your Own Website. Offering The Best Available And Used Techniques In Order To Make The Website More Useful And Effective For Your Customer. This Service Is Available Even After The Finish Of Website Creating.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
              <img src="{{URL::asset('user/img/service-details-3.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Advertising-Propaganda</h5>
                <p class="card-text">A High Level Of Marketing Services Are Available. Promote Your Business And Your Brands, And Get The Most Attractive Advertisement With Us. For More Information, You Can Visit Our Offices Or Through Pressing On "Contact Us" Link.</p>
              </div>
            </div>
          </div>

                    
          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
              <img src="{{URL::asset('user/img/truck2.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Shipping</h5>
                <p class="card-text">Providing On-Time Express Shipping Services For Customers In Any State Or Country In And Outside America. Get A Safety Shipping Process By Land Or Sea. To Get More Information Send Us An Email Or Call Us On The Phone Numbers Of Our Company.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
              <img src="{{URL::asset('user/img/import-export.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">IMPORT | EXPORT | AGENCIES</h5>
                <p class="card-text">Food Import And Export Is Our Major Specialization. Transferring The Foods Between Different Countries And Offering The Top High Quality. Najib Est Provides Import And Export Services To All Customers In The Fastest Time And The Best Cost. Customers Satisfaction Is The Main Target Behind The Excellence In Our Service. A Specialized Department In Import And Export Is Available.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
              <img src="{{URL::asset('user/img/packing.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Packaging</h5>
                <p class="card-text">Production Lines To Food Packaging Within The Required Sanitary Conditions And Standards Are Available. Ensuring The Cleanliness And Safety Of Fresh Food. There Is Professional Packaging For Variant Companies Under Their Names Or Our Name.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
              <img src="{{URL::asset('user/img/sampling.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Sampling</h5>
                <p class="card-text">High Quality Sampling Is Applied To Represent Your Product Well.</p>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up">
            <div class="card">
              <div class="card-img">
              <img src="{{URL::asset('user/img/domain.jpg')}}" alt="...">
              </div>
              <div class="card-body">
                <h5 class="card-title">Domain Name Registration</h5>
                <p class="card-text">Reserve Your Domain Name With Us, And Register The Brand Under Your Own Name.</p>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="last-card section-bg aos-init aos-animate" data-aos="fade-up" date-aos-delay="200">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 ">
            <img src="{{URL::asset('user/img/service-details-4.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
            <div class="information-box">
              <h4 class="title"><a href="">Web Site Management</a></h4>
              <p class="description">Najib Est Always Provides The Customers With The Highest Quality Products, The Developed Techniques, And The Most Advanced Pages Displaying And Designing. The Process Of Buying And Selling Through Our Websites, Is So Easy And Facilitated. Paying Attention To The Smallest Things And Details, Dates Respecting, Credibility At Work And The Constant Seeking To Serve The Customers Are Our Main Targets. Our Websites Are The Most Functional And Credible Sites You Are In The Convenient Place. Najib Est Has A Professional Academic Team, Works According To The Highest Standards Of Advertising Technology And Marketing.</p>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
