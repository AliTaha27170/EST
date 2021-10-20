@extends('layouts.app')
@section('content')

<style>
    .ser-box {
        margin: 100px 12%;
        background: #fff;
        box-shadow: #999 0 0 5px;
        padding: 5%;
        border-radius: 15px;
    }

    .ser-head {
        text-align: center;
        width: 100%;
    }

    .ser-head h1 {
        display: inline-block;
        margin: 0;
        margin-left: 15px;
        margin-bottom: 50px;
        vertical-align: middle;
    }

    .ser-box ul{
        list-style: none;
        padding: 0;
        margin: 0;
        display: block;
        text-align: center;
    }

    .ser-box ul li{
        display: inline-block;
        width: 24%;
        margin-bottom: 30px;
    }

    .ser-box ul li a{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    .ser-box ul li a span{
        font-size: 50px;
        width: 100px;
        height: 100px;
        background: #ddd;
        border-radius: 100px;
        margin: 0 auto;
        margin-bottom: 15px;
        padding-top: 24px;
        color: #001748
    }

</style>

<div class="ser-box">

    <div class="ser-head">
        <img hidden width="100" src="{{URL::asset('user/img/group.svg')}}" alt="">
        <h1>Our Services</h1>
    </div>

    <div>

        <ul>
            <li>
                <a>
                    <span class="fa fa-globe"></span>IMPORT - EXPORT- AGENCIES
                </a>
            </li>
            <li>
                <a>
                    <span class="fa fa-cutlery"></span>Food Distributed
                </a>
            </li>
            <li>
                <a>
                    <span class="fa fa-archive"></span>Packaging
                </a>
            </li>
            <li>
                <a>
                    <span class="fa fa-truck"></span>Shipping
                </a>
            </li>
            <li>
                <a>
                    <span class="fa fa-search"></span>Sampling
                </a>
            </li>
            <li>
                <a>
                    <span class="fa fa-newspaper-o"></span>Advertising-Propaganda
                </a>
            </li>
            <li>
                <a>
                    <span class="fa fa-internet-explorer"></span>Domain Name Registration
                </a>
            </li>
            <li>
                <a>
                    <span class="fa fa-magic"></span>Web Design & Development
                </a>
            </li>
            <li>
                <a>
                    <span class="fa fa-cogs"></span>Web Site Management
                </a>
            </li>
        </ul>

    </div>

</div>

@endsection
