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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách Sản phẩm</h3>

              <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" id="keyword" class="form-control pull-right" placeholder="Search">

                    <div class="input-group-btn">
                      <button type="button" onclick="search()" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Mã</th>
                  <th>Tên</th>
                  <th>Ảnh</th>
                  <th>Ảnh 2</th>
                  <th colspan="2">Chức năng</th>
                </tr>
                @foreach($lst_product as $product)
                	<tr>
	                  <td>{{ $product->id }}</td>
	                  <td>{{ $product->name }}</td>
                    <td>
                      <img width="50" height="50" src="{{ $product->image }}"/>
                    </td>
                    <td>
                      <img width="50" height="50" src="{{ $product->image1 }}"/>
                    </td>
                    <td><a href="product/edit/{{ $product->id }}">Sửa</a></td>
                    <td><a href="product/delete/{{ $product->id }}">Xóa</a></td>
	                </tr>
	            @endforeach
              
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-primary" href="/product/add">Thêm mới</a>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endsection