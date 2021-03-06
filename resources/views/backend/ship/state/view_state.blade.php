@extends('admin.admin_master')

@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <div class="col-lg-8">
         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">State List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="col-lg-1">Division Name</th>
                            <th class="col-lg-1">District Name</th>
                            <th class="col-lg-1">State Name</th>
                            <th class="col-lg-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($state as $item)
                            <tr>
                                <td>{{ $item->division->division_name }}</td>
                                <td>{{ $item->district->district_name }}</td>
                                <td>{{ $item->state_name }}</td>
                                
                                <td width="30%">
                                    <a href="{{ route('state.edit',$item->id) }}" class="btn btn-info" title="Edit District"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('state.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete District"><i class="fa fa-trash"></i></a>
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

        {{-- Add State Page --}}
        <div class="col-lg-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add State</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                    <form method="post" action="{{ route('state.store') }}">
                        @csrf

                            <div class="form-group">
                                <h5>Division Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" class="form-control"  >
                                            <option value="" selected="" disabled="">Select Division</option>
                                            @foreach($division as $div)

                                                <option value="{{ $div->id }}">{{ $div->division_name }}</option>

                                            @endforeach
                                        </select>
                                        @error('division_id') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>District Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="district_id" class="form-control"  >
                                            <option value="" selected="" disabled="">Select District</option>
                                            @foreach($district as $dis)

                                                <option value="{{ $dis->id }}">{{ $dis->district_name }}</option>

                                            @endforeach
                                        </select>
                                        @error('district_id') 
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <h5>State Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="state_name" class="form-control">
                                    @error('state_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add State">
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