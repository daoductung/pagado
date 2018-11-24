
        <div class="col-md-4">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Mã</th>
                  <th>Tên</th>
                  <th>Địa chỉ</th>
                  <th>SĐT</th>
                  <th colspan="2">Chức năng</th>
                </tr>
                @foreach($lst_order as $order)
                	<tr>
	                  <td>{{ $order->id }}</td>
	                  <td>{{ $order->name }}</td>
                    <td>
                     {{ $order->DiaChi }}
                    </td>
                    <td>
                     {{ $order->SDT }}
                    </td>
                    <td><a href="order/edit/{{ $order->id }}">Sửa</a></td>
                    <td><a href="order/delete/{{ $order->id }}">Xóa</a></td>
	                </tr>
	            @endforeach
              
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-primary" href="/order/add">Thêm mới</a>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>