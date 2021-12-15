@extends('layouts.master')

@section('title', $producer->name)

@section('content')

<section class="bread-crumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home_page') }}">{{ __('header.Home') }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('products_page') }}">Sản Phẩm</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $producer->name }}</li>
    </ol>
  </nav>
</section>

<div class="site-producer">
  <section class="section-advertise">
    <div class="content-advertise">
      <div id="slide-advertise" class="owl-carousel" style="height: 200px">
        @foreach($data['advertises'] as $advertise)
        <div class="slide-advertise-inner" style="background-image: url('{{ Helper::get_image_advertise_url($advertise->image) }}');height: 200px" data-dot="<button>{{ $advertise->title }}</button>"></div>
        @endforeach
      </div>
    </div>
  </section>

  <section class="section-filter">
    <div class="section-header">
      <h2 class="section-title">Tìm Kiếm Và Sắp Xếp</h2>
    </div>
    <div class="section-content">
      <form action="{{ route('producer_page', ['id' => $producer->id]) }}" method="GET" accept-charset="utf-8">
        <div class="row">
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-6">
                <input type="text" name="name" placeholder="Tìm kiếm..." value="{{ Request::input('name') }}">
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6">
                <select name='model'>
                  <option value='' {{ Request::input('model') == null ? 'selected' : '' }}>
                    Model
                  </option>
                  <option value="1" {{ Request::input('model') == '1' ? 'selected' : '' }}>Dòng máy Iphone</option>
                  <option value="2" {{ Request::input('model') == '2' ? 'selected' : '' }}>Dòng máy Android Chơi game / Cấu hình cao</option>
                  <option value="3" {{ Request::input('model') == '3' ? 'selected' : '' }}>Dòng máy Android Note</option>
                  <option value="4" {{ Request::input('model') == '4' ? 'selected' : '' }}>Dòng máy Android Pin khủng trên 5000 mAh</option>
              
                </select>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6">
                <select name='price'>
                  <option value='' {{ Request::input('price') == null ? 'selected' : '' }}>
                    Giá Sản Phẩm
                  </option>
                  <option value='asc' {{ Request::input('price') == 'asc' ? 'selected' : '' }}>
                    Giá từ thấp tới cao
                  </option>
                  <option value='desc' {{ Request::input('price') == 'desc' ? 'selected' : '' }}>
                    Giá từ cao tới thấp
                  </option>
                </select>
              </div>
              <div class="col-md-3 col-sm-6 col-xs-6">
                <select name='type'>
                  <option value='' {{ Request::input('type') == null ? 'selected' : '' }}>
                    Loại Sản Phẩm
                  </option>
                  <option value='promotion' {{ Request::input('type') == 'promotion' ? 'selected' : '' }}>
                    Sản phẩm khuyến mại
                  </option>
                  <option value='vote' {{ Request::input('type') == 'vote' ? 'selected' : '' }}>
                    Sản phẩm đánh giá cao
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-default">Lọc Sản Phẩm</button>
          </div>
        </div>
      </form>
    </div>
  </section>

  <section class="section-products">
    <div class="section-header">
      <div class="section-header-left">
        <h2 class="section-title">{{ $producer->name }}</h2>
      </div>
      <div class="section-header-right">
        <ul>
          @foreach($data['producers'] as $producer)
          <li><a href="{{ route('producer_page', ['id' => $producer->id]) }}" title="{{ $producer->name }}">{{ $producer->name }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="section-content">
      @if($data['products']->isEmpty())
      <div class="empty-content">
        <div class="icon"><i class="fab fa-searchengin"></i></div>
        <div class="title">Oooops!</div>
        <div class="content">Product Item Not Found</div>
      </div>
      @else
      <div class="row">
        @foreach($data['products'] as $key => $product)
        <div class="col-md-2 col-md-20">
          <div class="item-product">
            <a href="{{ route('product_page', ['id' => $product->id]) }}" title="{{ $product->name }}">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="image-product" style="background-image: url('{{ Helper::get_image_product_url($product->image) }}');padding-top: 100%;">
                    {!! Helper::get_promotion_percent($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                  </div>
                  <div class="content-product">
                    <h3 class="title">{{ $product->name }}</h3>
                    <div class="start-vote">
                      {!! Helper::get_start_vote($product->rate) !!}
                    </div>
                    <div class="price">
                      {!! Helper::get_real_price($product->product_detail->sale_price, $product->product_detail->promotion_price, $product->product_detail->promotion_start_date, $product->product_detail->promotion_end_date) !!}
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 animate">
                  <div class="product-details">
                    <p><strong><i class="fas fa-microchip"></i>Năng suất: </strong>{{ $product->productivity }}</p>
                    <p><strong><i class="fas fa-microchip"></i>Điện áp: </strong>{{ $product->vol }}</p>
                    <p><strong><i class="fas fa-microchip"></i>Công suất: </strong>{{ $product->wat }}</p>
                    <p><strong><i class="fas fa-microchip"></i>Bạc đạn: </strong>{{ $product->bearings }}</p>
                    <p><strong><i class="fas fa-microchip"></i>Tốc độ quay: </strong>{{ $product->speed }}</p>
                    <p><strong><i class="fas fa-microchip"></i>Trọng lượng: </strong>{{ $product->weight }}</p>
                    <p><strong><i class="fas fa-microchip"></i>Kích thước: </strong>{{ $product->size }}GB</p>
                    <p><strong><i class="fab fa-microchip"></i>Model: </strong>{{ $product->model }}</p>
                    <p><strong><i class="fas fa-microchip"></i>Bảo hành: </strong>{{ $product->insurance }}</p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
    <div class="section-footer text-center">
      {{ $data['products']->appends(Request::query())->links() }}
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
    -webkit-animation-duration: .6s;
    animation-duration: .6s;
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