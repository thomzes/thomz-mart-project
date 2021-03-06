@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row"> 

        {{-- Edit Category Page --}}
        <div class="col-lg-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{ route('category.update',$categories->id) }}">
                        @csrf
                        
                        <input type="hidden" name="id" value="{{ $categories->id }}">
                            <div class="form-group">
                                <h5>Category English<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_en" class="form-control" value="{{ $categories->category_name_en }}">
                                    @error('category_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Category Indonesia<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name_idn" class="form-control" value="{{ $categories->category_name_idn }}" >
                                    @error('category_name_idn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Category Icon<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_icon" class="form-control" value="{{ $categories->category_icon }}" >
                                    @error('category_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                           <div class="text-xs-right">
                               <a href="{{ route('all.category') }}" class="btn btn-rounded btn-warning mb-5">Back</a>
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