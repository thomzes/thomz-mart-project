@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <div class="col-lg-8">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sub Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-lg-1">Category</th>
                            <th class="col-lg-2">Sub Category En</th>
                            <th class="col-lg-2">Sub Category Idn</th>
                            <th class="col-lg-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $item)
                            <tr>
                                <td>class="{{ $item->category_id }}"</td>
                                <td>{{ $item->subcategory_name_en }}</td>
                                <td>{{ $item->subcategory_name_idn }}</td>
                                <td>
                                    <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
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

        {{-- Add Category Page --}}
        <div class="col-lg-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Sub Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{ route('category.store') }}">
                        @csrf
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="select" id="select" required="" class="form-control">
                                        <option value="">Select Your Category</option>
                                        <option value="1">India</option>
                                        <option value="2">USA</option>
                                        <option value="3">UK</option>
                                        <option value="4">Canada</option>
                                        <option value="5">Dubai</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Sub Category English<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_idn" class="form-control">
                                    @error('category_name_idn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Sub Category Indonesia<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_icon" class="form-control">
                                    @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Category">
                            </div>
                       </form>
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