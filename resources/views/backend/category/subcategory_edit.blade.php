@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row"> 

        {{-- Edit Sub Category Page --}}
        <div class="col-lg-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Sub Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{ route('subcategory.update') }}">
                        @csrf

                            <input type="hidden" name="id" value="{{ $subcategories->id }}">

                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" required="" class="form-control">
                                        <option value="" selected disabled>Select Category</option>

                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategories->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Sub Category English<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_en" class="form-control" value="{{ $subcategories->subcategory_name_en }}">
                                    @error('subcategories_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Sub Category Indonesia<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name_idn" class="form-control" value="{{ $subcategories->subcategory_name_idn }}">
                                    @error('subcategories_name_idn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                           <div class="text-xs-right">
                               <a href="{{ route('all.subcategory') }}" class="btn btn-rounded btn-warning mb-5">Back</a>
                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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