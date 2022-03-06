<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">

<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

 {{-- Toastr --}}
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">

<!-- ============================================== HEADER ============================================== -->

@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->

@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

{{-- CDN Sweetalert2 --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Toastr JS --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
     case 'info':
     toastr.info(" {{ Session::get('message') }} ");
     break;
 
     case 'success':
     toastr.success(" {{ Session::get('message') }} ");
     break;
 
     case 'warning':
     toastr.warning(" {{ Session::get('message') }} ");
     break;
 
     case 'error':
     toastr.error(" {{ Session::get('message') }} ");
     break; 
  }
  @endif 
 </script>

 <!-- ADD TO CART PRODUCT MODAL -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">

            <strong>
               <span id="pname">
               </span>
            </strong>

         </h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
       </div>
       {{-- end modal body --}}
       
       <div class="row">
          <div class="col-md-4">

            <div class="card mx-2" style="width: 18rem;">
               <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px; margin-left: 5px;" id="pimage">
               
             </div>
             
          </div>
          {{-- end col-md-4 --}}

          <div class="col-md-4">

            <ul class="list-group">

               <li class="list-group-item">Product Price: 
                  <strong class="text-danger">$<span id="pprice"></span></strong> 
                  <del id="oldprice">$</del></li>
               

               <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
               <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
               <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
               <li class="list-group-item">Stock: 
                  <span class="badge badge-pill badge-success" id="available" style="background: green; color:white;"></span>
                  <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color:white;"></span>
                  
               </li>

             </ul>
             
         </div>
         {{-- end col-md-4 --}}

         <div class="col-md-4">

            <div class="form-group" style="margin-right: 5px;" >
               <label for="color">Choose Color</label>
               <select class="form-control" id="color" name="color">
                 
               </select>
             </div>
             {{-- end form-group --}}

             <div class="form-group" id="sizeArea" style="margin-right: 5px;">
               <label for="size">Choose Size</label>
               <select class="form-control" id="size" name="size">
               </select>
             </div>
             {{-- end form-group --}}

             <div class="form-group" style="margin-right: 5px;">
               <label for="qty">Quantity</label>
               <input type="number" class="form-control" id="qty" value="1" min="1">
             </div>
             {{-- end form-group --}}


             <input type="hidden" name="" id="product_id">
             <button type="submit" class="btn btn-primary" style="margin-bottom: 10px" onclick="addToCart()" id="btnCart">Add to cart</button>
             
         </div>
         {{-- end col-md-4 --}}


       </div>
       {{-- end row --}}

     </div>
   </div>
 </div>
{{-- END ADD TO CART PRODUCT MODAL --}}



<script type="text/javascript">
   $.ajaxSetup({
      headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   })




   // Start Product View With Modal
   function productView(id)
   {
      // alert(id)

      $.ajax({
         type: 'GET',
         url: '/product/view/modal/' + id,
         dataType: 'json',
         success:function(data){
            // console.log(data)

            $('#pimage').attr('src', '/' + data.product.product_thumbnail);
            $('#pname').text(data.product.product_name_en);
            $('#price').text(data.product.selling_price);
            $('#pcode').text(data.product.product_code);
            $('#pcategory').text(data.product.category.category_name_en);
            $('#pbrand').text(data.product.brand.brand_name_en);


            $('#product_id').val(id);
            $('#qty').val(1);

            



            // Product Price
            if(data.product.discount_price == null) {
               $('#pprice').text('');
               $('#oldprice').text('');
               $('#pprice').text(data.product.selling_price);

            }else{
               $('#pprice').text(data.product.discount_price);
               $('#oldprice').text(data.product.selling_price);

            } //end product price





            // Stock Option
            if(data.product.product_qty > 0 ) {
               $('#available').text('Available');
               $('#stockout').text('');
               $('#btnCart').show();


            }else {
               $('#available').text('');
               $('#stockout').text('Stockout');
               $('#btnCart').hide();

            } //end stock option





            // Color 
            $('select[name="color"]').empty();
            $.each(data.color, function(key,value) {
               $('select[name="color"]').append('<option value=" '+value+' " >'+value+' </option>')

            }) //end color

            // Size 
            $('select[name="size"]').empty();
            $.each(data.size, function(key,value) {
               $('select[name="size"]').append('<option value=" '+value+' " >'+value+' </option>')

               if (data.size == "") {
                  $('#sizeArea').hide();
               }else{
                  $('#sizeArea').show();
               }

            }) //end size


         }

      })


   }
   // End Product View With Modal





   // Start Add to Cart Product with package bumbummen99

   function addToCart()
   {
      var product_name = $('#pname').text();
      var id = $('#product_id').val();
      var color = $('#color option:selected').text();
      var size = $('#size option:selected').text();
      var quantity = $('#qty').val();

      $.ajax({
         type: "POST",
         dataType: "json",
         data:{
            product_name:product_name, color:color, size:size, quantity:quantity
         },
         url: "/cart/data/store/" + id,
         success:function(data){

            miniCart()
            $('#closeModal').click();

            // console.log(data)

            // Start message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
                  })
            if ($.isEmptyObject(data.error)) {
               Toast.fire({
                  type:'success',
                  title: data.success
               })
               
            } else {
               Toast.fire({
                  type:'error',
                  title: data.error
               })
               
            }

            // End message

         }
      })

   }

   // End Add to Cart Product with package bumbummen99


</script>


<script type="text/javascript">
   function miniCart()
   {
      $.ajax({
         type: 'GET',
         url: '/product/mini/cart',
         dataType: 'json',
         success:function(response){

            $('span[id="cartSubTotal"]').text(response.cartTotal); //ERROR MINI CART SUBTOTAL
            $('#cartQty').text(response.cartQty);

            // console.log(response)
            var miniCart = ""

            $.each(response.carts, function(key,value){
               miniCart += `<div class="cart-item product-summary">
                              <div class="row">
                                 <div class="col-xs-4">
                                 <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                                 </div>
                                 <div class="col-xs-7">
                                 <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                 <div class="price">${value.price} * ${value.qty} </div>
                                 </div>
                                 <div class="col-xs-1 action">
                                 <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i> </button> </div>
                              </div>
                           </div>
                           <!-- /.cart-item -->
                           <div class="clearfix"></div>
                           <hr>`
            });

            $('#miniCart').html(miniCart);

         }
      })
   }
   miniCart();


// Mini Cart Remove Start
   function miniCartRemove(rowId)
   {
      $.ajax({
         type: 'GET',
         url: '/minicart/product-remove/' + rowId,
         dataType: 'json', 
         success:function(data){
            miniCart();

            // Start Message
            const Toast = swal.mixin({
               toast: true,
               position: 'top-end',
               icon: 'success',
               showConfirmButton: false,
               timer: 3000
            })
            if ($.isEmptyObject(data.error)) {
               Toast.fire({
                  type: 'success',
                  title: data.success

               })
            } else {
               Toast.fire({
                  type: 'error',
                  title: data.error

               })
            }
            // End Message



         }
      });
   }


   // End Mini Cart Remove 

   </script>




{{-- Start Add Wishlist Page --}}
   <script type="text/javascript">

      function addToWishlist(product_id)
      {
         $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '/add-to-wishlist/' + product_id,

            success:function(data){

               // Start Message
               const Toast = swal.mixin({
                  toast: true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 3000
               })
               if ($.isEmptyObject(data.error)) {
                  Toast.fire({
                     type: 'success',
                     icon: 'success',
                     title: data.success

                  })
               } else {
                  Toast.fire({
                     type: 'error',
                     icon: 'error',
                     title: data.error

                  })
               }
               // End Message

            }

         })

      }

   </script>

{{-- End Add Wishlist Page --}}


{{-- Start Load Wishlist Data --}}
   <script type="text/javascript">
      function wishlist()
      {
         $.ajax({
            type: 'GET',
            url: '/user/get-wishlist-product',
            dataType: 'json',
            success:function(response){

               var rows = ""

               $.each(response, function(key,value){
                  rows += `<tr>
                              <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="imga"></td>
                              <td class="col-md-7">
                                 <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                                 <div class="price">

                                 ${value.product.discount_price == null ? `${value.product.selling_price}` : `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                                 }
                                    
                                 </div>
                              </td>
                              <td class="col-md-2">

                                 <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)"> Add To Cart </button>

                              </td>
                              <td class="col-md-1 close-btn">
                                 <button type="submit" id="${value.id}" class="" onclick="wishlistRemove(this.id)"><i class="fa fa-times"></i></button>
                              </td>
                           </tr>`
               });

               $('#wishlist').html(rows);

            }
         })
      }
      wishlist();


   // Wishlist Remove Start
   function wishlistRemove(id)
   {
      $.ajax({
         type: 'GET',
         url: '/user/wishlist-remove/' + id,
         dataType: 'json', 
         success:function(data){
            wishlist();

            // Start Message
            const Toast = swal.mixin({
               toast: true,
               position: 'top-end',
               showConfirmButton: false,
               timer: 3000
            })
            if ($.isEmptyObject(data.error)) {
               Toast.fire({
                  type: 'success',
                  icon: 'success',
                  title: data.success

               })
            } else {
               Toast.fire({
                  type: 'error',
                  icon: 'error',
                  title: data.error

               })
            }
            // End Message



         }
      });
   }


   // End Wishlist Remove 

   </script>

{{-- End load Wishlist Data --}}





{{-- Start Load MyCart Data --}}
   <script type="text/javascript">
      function cart()
      {
         $.ajax({
            type: 'GET',
            url: '/user/get-cart-product',
            dataType: 'json',
            success:function(response){

               var rows = ""

               $.each(response.carts, function(key,value){
                  rows += `<tr>
                              <td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="widht:60px; height: 60px;"></td>
                              <td class="col-md-2">
                                 <div class="product-name"><a href="#">${value.name}</a></div>
                                 <div class="price">
                                 ${value.price}
                                 </div>
                              </td>

                              <td class="col-md-2">
                                 <strong>${value.options.color}</strong>
                              </td>

                              <td class="col-md-2">
                              ${value.options.size == null
                              ? `<span>...</span>`
                              : `<strong>${value.options.size}</strong>`
                              }
                              </td>

                              <td class="col-md-2">
                              ${value.qty > 1

                                 ?`<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button>`

                                 : `<button type="submit" class="btn btn-danger btn-sm" disabled >-</button>`
                              
                              }
                                 
                                    <input type="text" value="${value.qty}" min="1" max="100" style="width:25px;" disabled="">

                                 <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>
                              </td>

                              <td class="col-md-2">
                                 <strong>$${value.subtotal}</strong>
                              </td>

                              <td class="col-md-1 close-btn">
                                 <button type="submit" id="${value.rowId}" class="" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
                              </td>
                           </tr>`
               });

               $('#cartPage').html(rows);

            }
         })
      }
      cart();


   // MyCart Remove Start
   function cartRemove(id)
   {
      $.ajax({
         type: 'GET',
         url: '/user/cart-remove/' + id,
         dataType: 'json', 
         success:function(data){
            cart();
            miniCart();
            

            // Start Message
            const Toast = swal.mixin({
               toast: true,
               position: 'top-end',
               showConfirmButton: false,
               timer: 3000
            })
            if ($.isEmptyObject(data.error)) {
               Toast.fire({
                  type: 'success',
                  icon: 'success',
                  title: data.success

               })
            } else {
               Toast.fire({
                  type: 'error',
                  icon: 'error',
                  title: data.error

               })
            }
            // End Message



         }
      });
   }

   // End MyCart Remove 


   // ========================== Start Cart Increment =========================== //

   function cartIncrement(rowId)
   {
      $.ajax({
         type: 'GET',
         url: '/cart-increment/' + rowId,
         dataType: 'json',
         success:function(data){
            cart();
            miniCart();

         }

      });

   }

   // ========================== End Cart Increment =========================== //



   // ========================== Start Cart Decrement =========================== //

   function cartDecrement(rowId)
   {
      $.ajax({
         type: 'GET',
         url: '/cart-decrement/' + rowId,
         dataType: 'json',
         success:function(data){
            cart();
            miniCart();

         }

      });

   }

   // ========================== End Cart Decrement =========================== //

   </script>

{{-- End load MyCart Data --}}


{{-- =========================== START Coupon Apply Button =============================  --}}

   <script type="text/javascript">
   
      function applyCoupon()
      {
         var coupon_name = $('#coupon_name').val();

         $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {coupon_name:coupon_name},
            url: "{{ url('/coupon-apply') }}",
            success:function(data){
               // Start Message
            const Toast = swal.mixin({
               toast: true,
               position: 'top-end',
               showConfirmButton: false,
               timer: 3000
            })
            if ($.isEmptyObject(data.error)) {
               Toast.fire({
                  type: 'success',
                  icon: 'success',
                  title: data.success

               })
            } else {
               Toast.fire({
                  type: 'error',
                  icon: 'error',
                  title: data.error

               })
            }
            // End Message

            }

         })

      }

      

      // ================================ START Coupon Calculation =========================== \\

         function couponCalculated()
         {
            $.ajax({
               type: 'GET',
               url: "{{ url('/coupon-calculation') }}",
               dataType: "json",
               success:function(data){

                  if (data.total) {
                     $('#couponCalField').html(
                        ` <tr>
                              <th>
                                    <div class="cart-sub-total">
                                       Subtotal<span class="inner-left-md">$ ${data.total}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                       Grand Total<span class="inner-left-md">$ ${data.total}/span>
                                    </div>
                              </th>
                           </tr> `
                     )

                  } else {
                     $('#couponCalField').html(
                        ` <tr>
                              <th>
                                    <div class="cart-sub-total">
                                       Subtotal :<span class="inner-left-md">$ ${data.subtotal}</span>
                                    </div>
                                    <div class="cart-sub-total">
                                       Coupon Name :<span class="inner-left-md"> ${data.coupon_name}</span>
                                       <button type="submit"><i class="fa fa-times"> </i></button>
                                    </div>
                                    <div class="cart-sub-total">
                                       Discount Amount :<span class="inner-left-md">$ ${data.discount_amount}</span>
                                    </div>
                                    <div class="cart-grand-total">
                                       Grand Total :<span class="inner-left-md">$ ${data.total_amount}</span>
                                    </div>
                              </th>
                           </tr> `
                     )
                     
                  }


               }

            });

         }
         couponCalculated();
      
      
      
      
      
      // ================================ START Coupon Calculation ============================ \\
   
   
   </script>







{{-- =========================== END Coupon Apply Button =============================  --}}
 






















</body>
</html>