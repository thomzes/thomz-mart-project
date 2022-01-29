@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">	  

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Add Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form novalidate>
                  <div class="row">
                    <div class="col-12">
                        
                        {{-- first row --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand Select<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id" required="" class="form-control">
                                            <option value="" selected disabled>Select Brand</option>
    
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
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
                                        <select name="category_id" required="" class="form-control">
                                            <option value="" selected disabled>Select Category</option>
    
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                        <select name="subcategory_id" required="" class="form-control">
                                            <option value="" selected disabled>Select SubCategory</option>
    
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
                                        <select name="subsubcategory_id" required="" class="form-control">
                                            <option value="" selected disabled>Select Sub-SubCategory</option>
    
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
                                        <input type="text" name="product_name_en" class="form-control"> 
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
                                        <input type="text" name="product_name_idn" class="form-control"> 
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
                                        <input type="text" name="product_code" class="form-control"> 
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
                                        <input type="text" name="product_qty" class="form-control"> 
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
                                        <input type="text" name="product_tags_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
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
                                        <input type="text" name="product_tags_idn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
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
                                        <input type="text" name="product_size_en" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
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
                                        <input type="text" name="product_size_idn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color En<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_En" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
                                        @error('product_color_En')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Color Idn<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_idn" class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput"> 
                                        @error('product_color_idn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Selling Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control"> 
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                        </div> 
                        {{-- end fifth row --}}


                        {{-- sixth row --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Discount Price<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control"> 
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Main Thumbnail<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="product_thumbnail" class="form-control"> 
                                        @error('product_thumbnail')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- end col md 4 --}}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Multiple Image<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]" class="form-control"> 
                                        @error('multi_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> 
                            {{-- end col md 4 --}}

                        </div> 
                        {{-- end sixth row --}}



                        {{-- seventh row  CK Editors--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_en" id="textarea" class="form-control" required placeholder="Short Description Indonesia Indonesia"></textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- end col md 6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description Indonesia<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="short_desc_idn" id="textarea" class="form-control" required placeholder="Short Description Indonesia text"></textarea>
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
                                        <textarea id="editor1" name="long_desc_en" rows="10" cols="80">
                                            Long Description English
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- end col md 6 --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Long Description Indonesia<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea id="editor2" name="long_desc_idn" rows="10" cols="80">
                                            Long Description Indonesia
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
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                        <label for="checkbox_2">Hot Deals</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1">
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
                                        <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                        <label for="checkbox_5">Special Deals</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        {{-- end col md 6 --}}

                    </div>
                    {{-- end  new row --}}
                    
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
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
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
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

@endsection