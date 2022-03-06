@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row"> 

        {{-- Add Category Page --}}
        <div class="col-lg-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Division</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{ route('division.update', $divisions->id) }}">
                        @csrf

                            <div class="form-group">
                                <h5>Division Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="division_name" class="form-control" value="{{ $divisions->division_name }}">
                                    @error('division_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                           <div class="text-xs-right">
                                <a href="{{ route('manage-division') }}" class="btn btn-rounded btn-warning mb-5">Back</a>
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