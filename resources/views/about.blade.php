@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{URL::asset('user/css/AboutUs.css')}}">
<div class="about-box">
    <div class="about-head">
        <img hidden width="100" src="{{URL::asset('user/img/group.svg')}}" alt="">
        <h1>About Us</h1>
    </div>

    <p class="about-group">
        Najib Est. Inc. is a family owned business with its roots starting from its principal company,
        Yahya Najib, which was established in 1936. Yahya Najib is one of the leading importers,
        exporters and agents for manufacturers worldwide, with their main offices in Syria and branching
        out to different countries. The company is a representing agent for manufacturers of medicine
        from Europe, Swiss Watches, Japanese machinery and cosmetic companies in Germany.
        <br>
        <br>
        With Yahya Najib as our backbone, we have developed to be one of the major importer, exporter,
        and agent. We are a supplier of lots of products; some of the products that we supply are
        Vitamins, Sexual Health supplements, Medical Equipment accessories, Mediterranean and European
        food products, and Hookahs. We continue to grow through our long-standing partnerships with
        manufacturers and suppliers of the highest quality products from all over the world. We are
        introducing to our products American made natural supplements and medical accessories. We travel
        the world for traditional items and for the most exciting new products in order to enrich our
        customers’ choices. We always include the healthiest options together with traditional ones.
        <br>
        <br>
        We warmly welcome all friends from all over the world to be our business partners on the basis
        of equality and benefits to create a good future.
        <br>
        <br>
        Our mission is to provide our customers with the highest quality of products.

    </p>
    <div class="about-group">
        <h4><span class="fa fa-map-marker"></span> Find Us</h4>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12368.467802147386!2d-76.75511797199704!3d39.194791265361225!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe71272b61d984e9a!2sNajib+Est+Inc.!5e0!3m2!1sen!2s!4v1554642678690!5m2!1sen!2s"
            style="width:100%;" height="400" frameborder="0" style="border:0" allowfullscreen>
        </iframe>

    </div>

</div>

@endsection
