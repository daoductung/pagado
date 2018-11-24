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
              <h3 class="box-title">Thêm mới Sản phẩm</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/product/add" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="txtName">Tên</label>
                  <input type="text" class="form-control" id="txtName" name="Name" placeholder="Tên">
                </div>

                <div class="form-group">
                  <label for="txtImage">Ảnh</label>
                  <input type="file" name="Image" class="form-control" id="txtImage" placeholder="Ảnh">
                </div>
                 <div class="form-group">
                  <label for="txtImage">Ảnh 2</label>
                  <input type="file" name="Image1" class="form-control" id="txtImage" placeholder="Ảnh">
                </div>
            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection