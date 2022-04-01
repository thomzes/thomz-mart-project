@extends('admin.admin_master')

@section('admin')


    
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Create Admin User</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">

                   <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                       <div class="col-12">

                           <div class="row">
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Admin Username<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                               </div>
                               {{-- end col md 6 --}}
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                               </div>
                               {{-- end col md 6 --}}
                            </div>
                            {{-- end row  --}}



                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>Phone<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="text" name="phone" class="form-control">
                                         </div>
                                     </div>
                                </div>
                                {{-- end col md 6 --}}
                                <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>Password<span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="password" name="password" class="form-control">
                                         </div>
                                     </div>
                                </div>
                                {{-- end col md 6 --}}
                             </div>
                             {{-- end row  --}}


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="image" name="profile_photo_path" class="form-control" required=""> <div class="help-block"></div></div>
                                     </div>
                                </div>
                                {{-- end col md 6 --}}
                                <div class="col-md-6">
                                    <img class="rounded-circle" id="showImage" src="{{ url('upload/no_image.jpg') }}" style="width: 100px; height:100px;">
                                </div>
                                {{-- end col md 6 --}}
                            </div>
                            {{-- end row --}}

                            <hr>

                            {{-- new row --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="brand" value="1">
                                        <label for="checkbox_2">Brand</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="category" value="1">
                                        <label for="checkbox_3">Category</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" name="product" value="1">
                                        <label for="checkbox_4">Product</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5" name="slider" value="1">
                                        <label for="checkbox_5">Slider</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_6" name="coupons" value="1">
                                        <label for="checkbox_6">Coupons</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        {{-- end col md 6 --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_7" name="shipping" value="1">
                                        <label for="checkbox_7">Shipping</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_8" name="setting" value="1">
                                        <label for="checkbox_8">Setting</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_9" name="return_order" value="1">
                                        <label for="checkbox_9">Return Order</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_10" name="review" value="1">
                                        <label for="checkbox_10">Review</label>
                                    </fieldset>
                                    
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_11" name="orders" value="1">
                                        <label for="checkbox_11">Orders</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        {{-- end col md 6 --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_12" name="stock" value="1">
                                        <label for="checkbox_12">Stock</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_13" name="reports" value="1">
                                        <label for="checkbox_13">Reports</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_14" name="alluser" value="1">
                                        <label for="checkbox_14">All User</label>
                                    </fieldset>

                                    <fieldset>
                                        <input type="checkbox" id="checkbox_15" name="admin_user_role" value="1">
                                        <label for="checkbox_15">Admin User Role</label>
                                    </fieldset>
                                    
                                </div>
                            </div>
                        </div>
                        {{-- end col md 6 --}}
                    </div>
                    {{-- end  new row --}}





                        </div>   
                    </div>
                       <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Admin User">
                        </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>
    <!-- /.content -->

</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});


</script>

@endsection