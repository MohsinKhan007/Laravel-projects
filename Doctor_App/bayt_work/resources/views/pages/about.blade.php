@extends('layouts.app')
@section('content')
<section class="about_us padding_top">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 col-lg-6">
                <div class="about_us_img">
                    <img src="./images/site/top_service.png" alt="">
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="about_us_text">
                    <h2>About us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua
                        Quis ipsum suspendisse ultrices gravida. Risus cmodo viverra
                        maecenas accumsan lacus vel</p>
                    <a class="btn_2 " href="#">learn more</a>
                    <div class="banner_item">
                        <div class="single_item">
                            <img src="./images/site/banner_1.svg" alt="">
                            <h5>Emergency</h5>
                        </div>
                        <div class="single_item">
                            <img src="./images/site/banner_2.svg" alt="">
                            <h5>Appointment</h5>
                        </div>
                        <div class="single_item">
                            <img src="./images/site/banner_3.svg" alt="">
                            <h5>Qualfied</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection