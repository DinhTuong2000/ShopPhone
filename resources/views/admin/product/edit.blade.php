@extends('admin.layouts.master')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('embed-css')
<!-- include Bootstrap File Input -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/css/fileinput.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/themes/explorer-fa/theme.css" rel="stylesheet">
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
@endsection

@section('custom-css')
<style>
  span.error {
    display: block;
    margin-top: 5px;
    margin-bottom: 10px;
    color: #f30;
  }

  input.error,
  select.error {
    border-color: #f30;
    box-shadow: none;
  }
</style>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="{{ route('admin.product.index') }}"><i class="fa fa-product-hunt" aria-hidden="true"></i> Quản Lý Sản Phẩm</a></li>
  <li class="active">Chỉnh Sửa Sản Phẩm</li>
</ol>
@endsection

@section('content')

<form id="productForm" action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
  @csrf
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Thông Tin Sản Phẩm</h3>
      <div class="box-tools">
        <!-- This will cause the box to collapse when clicked -->
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <label for="title">Hình Ảnh Hiển Thị <span class="text-red">*</span></label>
          <div class="upload-image text-center">
            <div title="Image Preview" class="image-preview" style="background-image: url('{{ Helper::get_image_product_url($product->image) }}'); padding-top: 100%; background-weight: contain; background-repeat: no-repeat; background-position: center; margin-bottom: 5px; border: 1px solid #f4f4f4;"></div>
            <label for="upload" title="Upload Image" class="btn btn-primary btn-sm"><i class="fa fa-folder-open"></i>Chọn Hình Ảnh</label>
            <input type="file" accept="image/*" id="upload" style="display:none" name="image">
          </div>
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="name">Tên Sản Phẩm <span class="text-red">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Tên sản Phẩm" required autocomplete="off" value="{{ $product->name }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="sku_code">Mã Sản Phẩm <span class="text-red">*</span></label>
                <input type="text" name="sku_code" class="form-control" id="sku_code" placeholder="Mã sản Phẩm" required autocomplete="off" value="{{ $product->sku_code }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Hãng Sản Xuất <span class="text-red">*</span></label>
                <select class="form-control" name="producer_id" required>
                  <option value="">-- Chọn hãng sản xuất --</option>
                  @foreach($producers as $producer)
                  <option value="{{ $producer->id }}" {{ $product->producer_id == $producer->id ? 'selected' : '' }}>{{ $producer->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="productivity">Màn Hình <span class="text-red">*</span></label>
                <input type="text" name="productivity" class="form-control" id="productivity" placeholder="Màn Hình" required autocomplete="off" value="{{ $product->productivity }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="vol">Hệ Điều Hành <span class="text-red">*</span></label>
                <input type="text" name="vol" class="form-control" id="vol" placeholder="Hệ Điều Hành" required autocomplete="off" value="{{ $product->vol }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="wat">Camera Sau, Trước <span class="text-red">*</span></label>
                <input type="text" name="wat" class="form-control" id="wat" placeholder="Camera Sau, Trước" required autocomplete="off" value="{{ $product->wat }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Model<span class="text-red">*</span></label>
                <select class="form-control" name="model" required>
                  <option value="">-- Chọn model --</option>
                  <option value="1" {{ $product->model == '1' ? 'selected' : '' }}>Dòng máy Iphone</option>
                  <option value="2" {{ $product->model == '2' ? 'selected' : '' }}>Dòng máy Android Chơi game / Cấu hình cao</option>
                  <option value="3" {{ $product->model == '3' ? 'selected' : '' }}>Dòng máy Android Note</option>
                  <option value="4" {{ $product->model == '4' ? 'selected' : '' }}>Dòng máy Android Pin khủng trên 5000 mAh</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="bearings">Chip <span class="text-red">*</span></label>
                <input type="text" name="bearings" class="form-control" id="bearings" placeholder="Chip" required autocomplete="off" value="{{ $product->bearings }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="speed">RAM <span class="text-red">*</span></label>
                <input type="text" name="speed" class="form-control" id="speed" placeholder="RAM" required autocomplete="off" value="{{ $product->speed }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="weight">Bộ Nhớ Trong <span class="text-red">*</span></label>
                <input type="text" name="weight" class="form-control" id="weight" placeholder="Bộ Nhớ Trong" required autocomplete="off" value="{{ $product->weight }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="size">SIM<span class="text-red">*</span></label>
                <input type="text" name="size" class="form-control" id="size" placeholder="SIM" required autocomplete="off" value="{{ $product->size }}">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="insurance">Pin, Sạc <span class="text-red">*</span></label>
                <input type="text" name="insurance" class="form-control" id="insurance" placeholder="Pin, Sạc" required autocomplete="off" value="{{ $product->insurance }}">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Thông Tin Khuyến Mãi</h3>
      <div class="box-tools">
        <!-- This will cause the box to collapse when clicked -->
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div id="product-promotions">
        @if($product->promotions->isNotEmpty())
        @foreach($product->promotions as $promotion)
        <div class="box box-solid box-default collapsed-box" style="margin-bottom: 5px;">
          <div class="box-header">
            <h3 class="box-title">{{ $promotion->content }}</h3>
            <div class="box-tools">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
              <a href="javascript:void(0);" data-id="{{ $promotion->id }}" class="btn btn-box-tool remove-promotion" title="Xóa" data-url="{{ route('admin.product.delete_promotion') }}" style="color: #f30;">
                <i class="fa fa-times"></i>
              </a>
            </div>
          </div>
          <div class="box-body" style="display: none;">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group" style="margin-bottom: 0;">
                  <label for="old_promotion_{{ $promotion->id }}">Khuyến Mãi <span class="text-red">*</span></label>
                  <input type="text" name="old_product_promotions[{{ $promotion->id }}][content]" class="form-control promotion" id="old_promotion_{{ $promotion->id }}" placeholder="Khuyến Mãi" required autocomplete="off" value="{{ $promotion->content }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Thời Gian Khuyến Mãi</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right promotion-reservation" name="old_product_promotions[{{ $promotion->id }}][promotion_date]" autocomplete="off" required value="{{ date_format(date_create($promotion->start_date), 'd/m/Y').' - '.date_format(date_create($promotion->end_date), 'd/m/Y') }}">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
      <div class="text-center">
        <button class="add-promotion btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Khuyến Mãi</button>
      </div>
    </div>
  </div>
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Thông Tin Mẫu Mã Và Giá Sản Phẩm</h3>
      <div class="box-tools">
        <!-- This will cause the box to collapse when clicked -->
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div id="product-details">
        @if($product->product_details->isNotEmpty())
        @foreach($product->product_details as $product_detail)
        <div class="box box-solid box-default collapsed-box" style="margin-bottom: 5px;">
          <div class="box-header">
            <h3 class="box-title">
              <span class="name">{{ $product->name }}</span>
              <span class="color">{{ ' - '.$product_detail->design }}</span>
            </h3>
            <div class="box-tools">
              <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-plus"></i></button>
              <a href="javascript:void(0);" data-id="{{ $product_detail->id }}" class="btn btn-box-tool remove-product-detail" title="Xóa" data-url="{{ route('admin.product.delete_product_detail') }}" style="color: #f30;">
                <i class="fa fa-times"></i>
              </a>
            </div>
          </div>
          <div class="box-body" style="display: none;">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="design_{{ $product_detail->id }}">Mẫu Mã <span class="text-red">*</span></label>
                  <input type="text" name="old_product_details[{{ $product_detail->id }}][design]" class="form-control color" id="color_{{ $product_detail->id }}" placeholder="Mẫu mã" required autocomplete="off" value="{{ $product_detail->design }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="quantity_{{ $product_detail->id }}">Số Lượng <span class="text-red">*</span></label>
                  <input type="number" min="1" name="old_product_details[{{ $product_detail->id }}][quantity]" class="form-control" id="quantity_{{ $product_detail->id }}" placeholder="Số lượng" required autocomplete="off" value="{{ $product_detail->import_quantity }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="import_price_{{ $product_detail->id }}">Giá Nhập (VNĐ) <span class="text-red">*</span></label>
                  <input type="text" name="old_product_details[{{ $product_detail->id }}][import_price]" class="form-control currency" id="import_price_{{ $product_detail->id }}" placeholder="Giá nhập" required autocomplete="off" value="{{ $product_detail->import_price }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sale_price_{{ $product_detail->id }}">Giá Bán (VNĐ) <span class="text-red">*</span></label>
                  <input type="text" name="old_product_details[{{ $product_detail->id }}][sale_price]" class="form-control currency" id="sale_price_{{ $product_detail->id }}" placeholder="Giá bán" required autocomplete="off" value="{{ $product_detail->sale_price }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="promotion_price_{{ $product_detail->id }}">Giá Khuyến Mại (VNĐ)</label>
                  <input type="text" name="old_product_details[{{ $product_detail->id }}][promotion_price]" class="form-control currency" id="promotion_price_{{ $product_detail->id }}" placeholder="Giá khuyến mại" autocomplete="off" value="{{ $product_detail->promotion_price }}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Thời Gian Khuyến Mại</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right reservation" name="old_product_details[{{ $product_detail->id }}][promotion_date]" autocomplete="off" value="{{ $product_detail->promotion_start_date != null && $product_detail->promotion_end_date != NULL ?date_format(date_create($product_detail->promotion_start_date), 'd/m/Y').' - '.date_format(date_create($product_detail->promotion_end_date), 'd/m/Y') : '' }}">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
              <label>Hình Ảnh Chi Tiết <span class="text-red">*</span></label>
              <input type="file" name="old_product_details[{{ $product_detail->id }}][images][]" class="product-detail-{{ $product_detail->id }}-images" multiple>
            </div>
          </div>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#product-information" data-toggle="tab">Cấu Hình Chi Tiết</a></li>
      <li><a href="#product-introduction" data-toggle="tab">Bài Viết Sản Phẩm</a></li>
    </ul>
    <div class="tab-content">
      <div class="active tab-pane" id="product-information">
        <textarea name="information_details" rows="20">{{ $product->information_details }}</textarea>
      </div>
      <div class="tab-pane" id="product-introduction">
        <textarea name="product_introduction" rows="20">{{ $product->product_introduction }}</textarea>
      </div>
    </div>
  </div>
  <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-flat pull-right"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</button>
        <a href="{{ route('admin.product.index') }}" class="btn btn-danger btn-flat pull-right" style="margin-right: 5px;"><i class="fa fa-ban" aria-hidden="true"></i> Hủy</a>
      </div>
    </div>
  </div>
</form>
@endsection

@section('embed-js')
<!-- include tinymce js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.0.15/tinymce.min.js"></script>
<!-- include jquery.repeater -->
<script src="{{ asset('AdminLTE/bower_components/jquery.repeatable.js') }}"></script>
<!-- include Bootstrap File Input -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.6/themes/explorer-fa/theme.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('AdminLTE/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- autoNumeric -->
<script src="{{ asset('AdminLTE/bower_components/autoNumeric.js') }}"></script>
<!-- Jquery Validate -->
<script src="{{ asset('AdminLTE/bower_components/jquery-validate/jquery.validate.js') }}"></script>
@endsection

@section('custom-js')
<script>
  tinymce.init({
    selector: '#product-information>textarea',
    plugins: 'media image code table link lists preview fullscreen',
    toolbar: 'undo redo | formatselect | fontsizeselect | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link image media table | code preview fullscreen',
    toolbar_drawer: 'sliding',
    entity_encoding : "raw",
    branding: false,
    /* enable title field in the Image dialog*/
    image_title: true,
    height: 400,
    min_height: 300,
    /* Link Custom */
    link_assume_external_targets: 'http',
    /* disable media advanced tab */
    media_alt_source: false,
    media_poster: false,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
      images_upload_url: 'postAcceptor.php',
      here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

      /*
        Note: In modern browsers input[type="file"] is functional without
        even adding it to the DOM, but that might not be the case in some older
        or quirky browsers like IE, so you might want to add it to the DOM
        just in case, and visually hide it. And do not forget do remove it
        once you do not need it anymore.
      */

      input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
          /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
          */
          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          /* call the callback and populate the Title field with the file name */
          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    }
  });

  tinymce.init({
    selector: '#product-introduction>textarea',
    plugins: 'media image code table link lists preview fullscreen',
    toolbar: 'undo redo | formatselect | fontsizeselect | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link image media table | code preview fullscreen',
    toolbar_drawer: 'sliding',
    entity_encoding : "raw",
    branding: false,
    /* enable title field in the Image dialog*/
    image_title: true,
    height: 400,
    min_height: 300,
    /* Link Custom */
    link_assume_external_targets: 'http',
    /* disable media advanced tab */
    media_alt_source: false,
    media_poster: false,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    /*
      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
      images_upload_url: 'postAcceptor.php',
      here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');

      /*
        Note: In modern browsers input[type="file"] is functional without
        even adding it to the DOM, but that might not be the case in some older
        or quirky browsers like IE, so you might want to add it to the DOM
        just in case, and visually hide it. And do not forget do remove it
        once you do not need it anymore.
      */

      input.onchange = function () {
        var file = this.files[0];

        var reader = new FileReader();
        reader.onload = function () {
          /*
            Note: Now we need to register the blob in TinyMCEs image blob
            registry. In the next release this part hopefully won't be
            necessary, as we are looking to handle it internally.
          */
          var id = 'blobid' + (new Date()).getTime();
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          var base64 = reader.result.split(',')[1];
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);

          /* call the callback and populate the Title field with the file name */
          cb(blobInfo.blobUri(), { title: file.name });
        };
        reader.readAsDataURL(file);
      };

      input.click();
    }
  });

  $(document).ready(function(){
    $("#upload").change(function(event) {
      var target = event.target || event.srcElement;
      if (target.value.length == 0) {
        $('.upload-image .image-preview').css('background-image', 'url("{{ Helper::get_image_product_url() }}")');
      } else {
        $('.upload-image .image-preview').css('background-image', 'url("' + getImageURL(this) + '")');
      }
    });
  });

  function getImageURL(input) {
    return URL.createObjectURL(input.files[0]);
  };

  $(function() {
    $("#product-promotions").repeatable({
      addTrigger: 'button.add-promotion',
      deleteTrigger: 'button.delete-promotion',
      template: "#product-promotion",
      afterAdd:function () {
        $('.promotion-reservation').daterangepicker({
          autoApply: true,
          minDate: moment(),
          "locale": {
            "format": "DD/MM/YYYY",
          }
        });
        $('#product-promotions .box').boxWidget();
        $('#product-promotions .field-group:not(:last-child) .box').boxWidget('collapse');
        $('#product-promotions .field-group:last-child .box').boxWidget('expand');
        $('input.promotion').on('keyup', function() {
          var val = $(this).val().trim();
          $(this).closest('.box').find('.box-header .box-title').text(val);
        });
      }
    });
    $("#product-details").repeatable({
      addTrigger: 'button.add',
      deleteTrigger: 'button.delete',
      max: 5,
      min: 1,
      template: "#product-detail",
      afterAdd:function () {
        $(".product-detail-images").fileinput({
          theme: "explorer-fa",
          required: true,
          showUpload: false,
          showCaption: false,
          showClose: false,
          maxFileCount: 8,
          allowedFileExtensions: ['jpg', 'png', 'gif'],
          initialPreviewAsData: true,
          maxFileSize: 1000,
          overwriteInitial: false,
          removeFromPreviewOnError: true,
        });
        $('.reservation').daterangepicker({
          autoApply: true,
          autoUpdateInput: false,
          minDate: moment(),
          "locale": {
            "format": "DD/MM/YYYY",
          }
        });
        $('.reservation').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
        });
        $('.reservation').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
        });
        $('input.currency').autoNumeric('init', {
          aSep: '.',
          aDec: ',',
          aPad: false,
          lZero: 'deny',
          vMin: '0'
        });
        $('#product-details .box').boxWidget();
        $('#product-details .field-group:not(:last-child) .box').boxWidget('collapse');
        $('#product-details .field-group:last-child .box').boxWidget('expand');
        $('input.color').on('keyup', function() {
          var val = $(this).val().trim();
          if(val !== '') val = ' - ' + val;
          var name = $('input[name="name"]').val().trim();
          $(this).closest('.box').find('.box-header .box-title span.name').text(name);
          $(this).closest('.box').find('.box-header .box-title span.color').text(val);
        });
      },
      beforeDelete: function(target) {
        $(target).find('.product-detail-images').fileinput('destroy');
      }
    });

    $(".product-detail-images").fileinput({
      theme: "explorer-fa",
      required: true,
      showUpload: false,
      showCaption: false,
      showClose: false,
      maxFileCount: 8,
      allowedFileExtensions: ['jpg', 'png', 'gif'],
      initialPreviewAsData: true,
      maxFileSize: 1000,
      overwriteInitial: false,
      removeFromPreviewOnError: true,
    });

    $('input[name="name"]').on('keyup', function() {
      var val = $(this).val().trim();
      $('#product-details .field-group .box .box-header .box-title span.name').text(val);
    });

    $('input.color').on('keyup', function() {
      var val = $(this).val().trim();
      if(val !== '') val = ' - ' + val;
      var name = $('input[name="name"]').val().trim();
      $(this).closest('.box').find('.box-header .box-title span.name').text(name);
      $(this).closest('.box').find('.box-header .box-title span.color').text(val);
    });

    $('.reservation').daterangepicker({
      autoApply: true,
      autoUpdateInput: false,
      minDate: moment(),
      "locale": {
        "format": "DD/MM/YYYY",
      }
    });
    $('.reservation').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
    });
    $('.reservation').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });
    $('input.currency').autoNumeric('init', {
      aSep: '.',
      aDec: ',',
      aPad: false,
      lZero: 'deny',
      vMin: '0'
    });
    $("#productForm").validate({
      normalizer: function( value ) {
        return $.trim( value );
      },
      errorElement: "span",
      ignore: "",
      highlight: function(element, errorClass, validClass) {
        $(element).addClass(errorClass).removeClass(validClass);
        if($(element).parents('div#product-details').length || $(element).parents('div#product-promotions').length) {
          $(element).parents('.box').boxWidget('expand');
        }
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass(errorClass).addClass(validClass);
      }
    });
  });
</script>

<script type="text/template" id="product-promotion">
<div class="field-group">
  <div class="box box-solid box-default" style="margin-bottom: 5px;">
    <div class="box-header">
      <h3 class="box-title"></h3>
      <div class="box-tools">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        <button class="btn btn-box-tool delete-promotion" title="Remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group" style="margin-bottom: 0;">
            <label for="promotion_{?}">Khuyến Mãi <span class="text-red">*</span></label>
            <input type="text" name="product_promotions[{?}][content]" class="form-control promotion" id="promotion_{?}" placeholder="Khuyến Mãi" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Thời Gian Khuyến Mãi</label>
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right promotion-reservation" name="product_promotions[{?}][promotion_date]" autocomplete="off" required>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</script>
@endsection
