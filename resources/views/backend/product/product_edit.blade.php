@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">	  

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Edit Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form action="{{ route('product-update') }}" method="post">
                    @csrf

                    <input type="hidden" name="id" value="{{ $products->id }}">

                  <div class="row">
                    <div class="col-12">
                        
                        {{-- first row --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand Select<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" required="" class="form-control" required>
                                            <option value="" selected disabled>Select Brand</option>
    
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                                            @endforeach
    
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Category Select<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" required="" class="form-control" required>
                                            <option value="" selected disabled>Select Category</option>
    
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                            @endforeach
    
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>SubCategory Select<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" required="" class="form-control" required>
                                            <option value="" selected disabled>Select SubCategory</option>

                                            @foreach ($subcategories as $subcat)
                                            <option value="{{ $subcat->id }}" {{ $subcat->id == $products->subcategory_id ? 'selected' : '' }}>{{ $subcat->subcategory_name_en }}</option>
                                            @endforeach
    
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                        </div> 
                        {{-- end  first row --}}


                        {{-- second row --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Sub-SubCategory Select<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" required="" class="form-control" required>
                                            <option value="" selected disabled>Select Sub-SubCategory</option>

                                            @foreach ($subsubcategories as $subsubcat)
                                            <option value="{{ $subsubcat->id }}" {{ $subsubcat->id == $products->subsubcategory_id ? 'selected' : '' }}>{{ $subsubcat->subsubcategory_name_en }}</option>
                                            @endforeach
    
                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control" value="{{ $products->product_name_en }}" required> 
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Name Idn<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_idn" class="form-control" value="{{ $products->product_name_idn }}" required> 
                                        @error('product_name_idn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                        </div> 
                        {{-- end second row --}}


                        {{-- third row --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Code<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}" required> 
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Qty<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control" value="{{ $products->product_qty }}" required> 
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" class="form-control" value="{{ $products->product_tags_en }}" data-role="tagsinput" required> 
                                        @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                        </div> 
                        {{-- end third row --}}


                        {{-- fourth row --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Tags Idn<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_idn" class="form-control" value="{{ $products->product_tags_idn }}" data-role="tagsinput" required> 
                                        @error('product_tags_idn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" class="form-control" value="{{ $products->product_size_en }}"data-role="tagsinput" required> 
                                        @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Size Idn<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_idn" class="form-control" value="{{ $products->product_size_idn }}"data-role="tagsinput" required> 
                                        @error('product_size_idn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>  
                            {{-- end col md 4 --}}

                        </div> 
                        {{-- end fourth row --}}


                        {{-- fifth row --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" class="form-control" value="{{ $products->product_color_en }}" data-role="tagsinput" required> 
                                        @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Color Idn<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_idn" class="form-control" value="{{ $products->product_color_idn }}" data-role="tagsinput" required> 
                                        @error('product_color_idn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 6 --}}

                        </div> 
                        {{-- end fifth row --}}


                        {{-- sixth row --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control" value="{{ $products->selling_price }}" required> 
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        {{-- end col md 6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}" required> 
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 6 --}}

                        </div> 
                        {{-- end sixth row --}}



                        {{-- seventh row  CK Editors--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_en" id="textarea" class="form-control" required placeholder="Short Description English..." required>
                                            {!! $products->short_desc_en !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- end col md 6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description Indonesia<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_idn" id="textarea" class="form-control" required placeholder="Short Description Indonesia..." required>
                                            {!! $products->short_desc_idn !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- end col md 6 --}}

                        </div> 
                        {{-- end seventh row --}}



                        {{-- eighth row CK Editors--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor1" name="long_desc_en" rows="10" cols="80" required>
                                            {!! $products->long_desc_en !!}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- end col md 6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description Indonesia<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_desc_idn" rows="10" cols="80" required>
                                            {!! $products->long_desc_idn !!}
                                        </textarea> 
                                    </div>
                                </div>
                            </div>
                            {{-- end col md 6 --}}

                        </div> 
                        {{-- end eighth row --}}

                        <hr>
  
                    </div>
                    {{-- end col --}}
                  </div>
                  {{-- end row --}}



                  {{-- new row --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $products->hot_deals == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        {{-- end col md 6 --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $products->special_deals == 1 ? 'checked' : '' }}>
                                        <label for="checkbox_5">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        {{-- end col md 6 --}}

                    </div>
                    {{-- end  new row --}}
                    
                    <div class="text-xs-right">
                        <a href="{{ route('manage-product') }}" class="btn btn-rounded btn-warning mb-5">Back</a>
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
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

    {{-- ==================================== Start Multiple Image Update Area ========================================== --}}

    <section class="content">
        <div class="row">

            <div class="col-md-12">
				<div class="box bt-3 border-info">
				  <div class="box-header">
					<h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
				  </div>

                  <form action="" method="" enctype="multipart/form-data">
                        <div class="row row-sm">     
                            @foreach ($multiImgs as $img)
                                
                            <div class="col-md-3">
                                <div class="card">
                                    <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </h5>
                                        <p class="card-text">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input type="file" class="form-control" name="multi_img[ $img->id ]">
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- end col-md-3 --}}
                            @endforeach  
                            

                        </div>

                        <div class="text-xs-right mx-4">
                            <a href="{{ route('manage-product') }}" class="btn btn-rounded btn-warning mb-5">Back</a>
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                        </div>

                        <br>
                
                
                  </form>

				</div>
			  </div>



        </div>
        {{-- end row --}}

    </section>




  </div>


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });


        $('select[name="subcategory_id"]').on('change', function() {
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{ url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
    });
</script>

<script type="text/javascript">
    function mainThumUrl(input)
    {
        if(input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
 
    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
             
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
             
        }else{
            alert("Your browser doesn't support File API!"); //if file dont have API
        }
     });
    });
     
    </script>

@endsection