@extends('layouts.master')

@section('title', 'Giới Thiệu')

@section('content')

<section class="bread-crumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home_page') }}">{{ __('header.Home') }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Giới Thiệu</li>
    </ol>
  </nav>
</section>

<div class="site-about">
  <section class="section-advertise" >
    <div class="content-advertise" >
      <div id="slide-advertise" class="owl-carousel" style="height: 200px">
        @foreach($advertises as $advertise)
        <div class="slide-advertise-inner" style="background-image: url('{{ Helper::get_image_advertise_url($advertise->image) }}');height: 200px" data-dot="<button>{{ $advertise->title }}</button>"></div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="section-about">
    <div class="section-header">
      <h2 class="section-title">Giới Thiệu</h2>
    </div>
    <div class="section-content">
      <div class="row">
        <div class="col-md-9 col-sm-8">
          <div class="content-left">
            <div class="note">
              <div class="note-icon"><i class="fas fa-info-circle"></i></div>
              <div class="note-content">
                <i>Website <strong style="color: red;font-weight:bold;font-size: 24px">Phone Store</strong> thuộc <span style="font-weight: bolder;color: #256c20">công ty điện thoại di động IT</span> nhằm đưa sản phẩm tốt nhất đến tay người dúng.</i>
              </div>
            </div>
            <div class="content">
           
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4">
          <div class="content-right">
            <div class="online_support">
              <h2 class="title">CHÚNG TÔI LUÔN SẴN SÀNG<br>ĐỂ GIÚP ĐỠ BẠN</h2>
              <img src="{{ asset('images/support_online.jpg') }}">
              <h3 class="sub_title">Để được hỗ trợ tốt nhất. Hãy gọi</h3>
              <div class="phone">
                <a href="tel:0979396926" title="0979396926">0326663040</a>
              </div>
              <div class="or"><span>HOẶC</span></div>
              <h3 class="title">Chat hỗ trợ trực tuyến</h3>
              <h3 class="sub_title">Chúng tôi luôn trực tuyến 24/7.</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>

@endsection

@section('css')
<style>
  .slide-advertise-inner {
    background-repeat: no-repeat;
    background-size: cover;
    padding-top: 21.25%;
  }

  #slide-advertise.owl-carousel .owl-item.active {
    -webkit-animation-name: zoomIn;
    animation-name: zoomIn;
    -webkit-animation-duration: .3s;
    animation-duration: .3s;
  }
</style>
@endsection

@section('js')
<script>
  $(document).ready(function() {

    $("#slide-advertise").owlCarousel({
      items: 2,
      autoplay: true,
      loop: true,
      margin: 10,
      autoplayHoverPause: true,
      nav: true,
      dots: false,
      responsive: {
        0: {
          items: 1,
        },
        992: {
          items: 2,
          animateOut: 'zoomInRight',
          animateIn: 'zoomOutLeft',
        }
      },
      navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>']
    });
  });
</script>
@endsection