@extends('layout.layout')
@section('admin-main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sản phẩm
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sửa Sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/product/edit" enctype="multipart/form-data" method="POST">
              @csrf
               <input type="hidden" name="Id" value="{{ $product->id }}">

              <div class="box-body">
                <div class="form-group">
                  <label for="txtName">Tên</label>
                  <input type="text" name="Name" value="{{ $product->name }}" class="form-control" id="txtName"placeholder="Tên">
                </div>

                 <div class="form-group">
                  <label for="txtImage">Ảnh</label><br>
                  <img width="100" height="100" src="/{{ $product->image }}"/>
                  <input type="file" name="Image" class="form-control" id="txtImage" placeholder="Ảnh">
                </div>

                 <div class="form-group">
                  <label for="txtImage">Ảnh 2</label><br>
                  <img width="100" height="100" src="/{{ $product->image1 }}"/>
                  <input type="file" name="Image1" class="form-control" id="txtImage" placeholder="Ảnh">
                </div>

    
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection