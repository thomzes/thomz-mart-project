@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <div class="col-lg-12">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Product List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-lg-1">Product Image</th>
                            <th class="col-lg-4">Product Name En</th>
                            <th class="col-lg-4">Product Name Idn</th>
                            <th class="col-lg-1">Quantity</th>
                            <th class="col-lg-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td><img src="{{ asset($item->product_thumbnail) }}" style="width: 60px; height: 50px;" ></td>
                                <td>{{ $item->product_name_en }}</td>
                                <td>{{ $item->product_name_idn }}</td>
                                <td>{{ $item->product_qty }}</td>
                                <td>
                                    <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger" id="delete" id="Delete Data"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
</div>


@endsection