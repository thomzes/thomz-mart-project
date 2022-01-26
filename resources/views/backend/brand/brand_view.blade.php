@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Brand List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Brand En</th>
                            <th>Brand Idn</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $item)
                            <tr>
                                <td>{{ $item->brand_name_en }}</td>
                                <td>{{ $item->brand_name_idn }}</td>
                                <td><img src="{{ asset('$item->brand_image') }}" style="width: 70px; height:40px;"></td>
                                <td>
                                    <a href="" class="btn btn-info">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
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