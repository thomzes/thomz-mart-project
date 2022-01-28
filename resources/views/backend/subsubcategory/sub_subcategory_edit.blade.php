@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row"> 

        {{-- Edit Sub-SubCategory Page --}}
        <div class="col-lg-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Sub-SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{ route('subsubcategory.update') }}">
                        @csrf

                            <input type="hidden" name="id" value="{{ $subsubcategories->id }}">
                            
                            <div class="form-group">
                                <h5>Category Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="category_id" required="" class="form-control">
                                        <option value="" selected disabled>Select Category</option>

                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="subcategory_id" required="" class="form-control">
                                        <option value="" selected disabled>Select SubCategory</option>

                                        @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsubcategories->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                        @endforeach

                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Sub-SubCategory English<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategories->subsubcategory_name_en }}">
                                    @error('subsubcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Sub-SubCategory Indonesia<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subsubcategory_name_idn" class="form-control" value="{{ $subsubcategories->subsubcategory_name_idn }}">
                                    @error('subsubcategory_name_idn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                           <div class="text-xs-right">
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