<!DOCTYPE html>
<html>
<head>
    <title>Adress whatsIn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--   <link rel="stylesheet" type="text/css" href="{{asset('f_assets/css/bootstrap.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('f_assets/css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('f_assets/cssstyle/products.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>

</head>
<body id="body"
      {{--      style="background-color: {{$detail->color}}">--}}
      onload="myFunction14()">

<input hidden id="color" name="color" value="{{$detail->color}}">
{{--@dd($detail->color)--}}
<div class="header" id="header">
    <div class="contain_logo">
        @if($detail->logo !=null)
            <img class="logo" src="{{$detail->logo}}">
        @else
            <img class="logo" hidden>
        @endif
        <h1 class="BERSHKA" onclick="myFunction14() ">{{$content->name}}</h1>
    </div>
</div>
<div class="catocare">
    <span class="span" style="cursor:pointer" onclick="openNav()"> الاصناف</span>
    <img class="iconedit" src="{{asset('f_assets/svg/catocare.svg')}}" onclick="openNav()">

</div>
<div class="dropdown">
    <button class="button" type="submit" onclick="myFunction1()">
        <span> تعديل</span>
        <img class="iconedit" src="{{asset('f_assets/svg/edit.svg')}}">
    </button>
    <div class="divedit" id="divedit">
        <ul class="list_edit">
            <li class="li2">
                <a href="{{route('color')}}">
                    تعديل اللون
                </a>
            </li>
            <li class="li2">
                <a href="{{route('color')}}">تعديل اللوغو</a>
            </li>
            <li class="li2">
                <a href="{{route('category')}}">تعديل الاصناف</a>
            </li>
            <li class="li1" style="border-bottom: 0;">
                <a style="color: red" href="{{route('sublogout')}}">
                    تسجيل الخروج </a>
            </li>
        </ul>

    </div>
</div>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="dropdown">
        <a onclick="Functionlink()" class="link">الاصناف</a>
        <div id="myDropdownlink" class="dropdown-contentlink">
            <ul class="dropdown_ul">

                @if($cats !=null ||[])

                    @foreach($cats as $cat)
                        <li class="link_li">
                            {{--                            <a onclick="fetch_products_data({{$cat->id}})">--}}
                            <a href="{{route('IndexProduct',$cat->id)}}">
                                <p class="product_name">{{$cat->name}}</p>

                            </a>
                        </li>
                    @endforeach
                @endif

            </ul>
        </div>
    </div>
    <a class="link" href="{{route('IndexProduct')}}">العروض</a>
    <a class="link" href="#">من نحن</a>

</div>
<div id="products">
    {{--    @include('subscribers.products')--}}

    <section class="section1">
        <div class="container">
            @if($cat_id!=null)
                <div type="button" class="contenprod text-center mb-0" data-toggle="modal" data-target="#myModal">
                    <input type="image" src="{{asset('f_assets/svg/اضافة.svg')}}" name="saveForm" class="img"
                           id="saveForm"
                           data-whatever="@getbootstrap"/>
                    <h1>انقر لإضافة منتج</h1>
                </div>
            @endif
            {{--            @dd($products)--}}
            <div id="products" class="">
                {{--            @include('subscribers.productsCard')--}}
                <section class="section1 mt-3">

                    <div class="row">
                        @if($products!= null)
                            @foreach($products as $product)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 mb-3">
                                    <div class="enterproduct ">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool dropdown-toggle"
                                                    data-toggle="dropdown">
                                                <i class="fas fa-wrench"></i>
                                            </button>

                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                @if($cat_id !==null)
                                                    <ul class="list_edit text-center">
                                                        <li>
                                                            <form class="mr-1 "
                                                                  action="{{route('DeleteProduct',$product->id)}}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="link2 text-center" type="submit">
                                                                    حذف
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li class="">
                                                            <a class="code-dialog" href="#"
                                                               data-id="{{$product->id}}"
                                                               data-name="{{$product->name}}"
                                                               data-description="{{$product->description}}"
                                                               data-price="{{$product->price}}"
                                                               data-image-product="{{asset($product->image_product)}}"
                                                               data-image1="{{asset($product->image1)}}"
                                                               data-image2="{{asset($product->image2)}}"
                                                               data-image3="{{asset($product->image3)}}"
                                                               data-image4="{{asset($product->image4)}}"
                                                               data-image5="{{asset($product->image5)}}"
                                                               data-toggle="modal" data-target="#myModalEdit"
                                                               data-target-id="{{$product->id}}"> تعديل
                                                            </a>
                                                        </li>
                                                        <li style="border-bottom: 0;">
                                                            <a class="code-dialog-offer" href="#"
                                                               data-id="{{$product->id}}"
                                                               data-name="{{$product->name}}"
                                                               data-description="{{$product->description}}"
                                                               data-price="{{$product->price}}"
                                                               data-price_new="{{$product->price_new}}"
                                                               data-days-offer="{{$product->days_offer}}"
                                                               data-image-product="{{asset($product->image_product)}}"
                                                               data-image1="{{asset($product->image1)}}"
                                                               data-image2="{{asset($product->image2)}}"
                                                               data-image3="{{asset($product->image3)}}"
                                                               data-image4="{{asset($product->image4)}}"
                                                               data-image5="{{asset($product->image5)}}"
                                                               data-toggle="modal" data-target="#myModalOffer">إضافة
                                                                للعروض</a>
                                                        </li>
                                                    </ul>
                                                @endif


                                                @if($cat_id==null)
                                                    <ul class="list1_edit text-center">
                                                        <li>
                                                            <form class="mr-1 "
                                                                  action="{{route('OfferDelete',$product->id)}}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="link2 text-center" type="submit">
                                                                    حذف العرض
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                    {{--                                                {{—                                                <div class="dropdown-content text-center" id="dropdown-content">--}}
                                                    {{--                                                {{—                                                    <a>حذف العرض </a>--}}
                                                    {{--                                                {{—                                                </div>--}}
                                                @endif
                                            </div>
                                        </div>
                                        <a href="{{route('productDetails',$product->id)}}">
                                            <div class="contimg">

                                                <img class="imgprod" src="{{asset($product->image_product)}}">

                                            </div>

                                            <h1>{{$product->name}}</h1>
                                            <div style="display: flex;justify-content: space-around;">
                                                <div>
                                                    @if($product->price_new)
                                                        <h2>{{$product->price}}<span>SYR</span></h2>
                                                </div>
                                            </div>
                                            @else

                                                <div style="display: flex;justify-content: space-around;">
                                                    <div>
                                                        <h2 class="old">{{$product->price}}<span>SYR</span></h2>
                                                    </div>
                                                    <div>
                                                        <h2>{{$product->price_new}}<span>SYR</span></h2>
                                                    </div>
                                                </div>
                                            @endif
                                        </a>


                                        {{--                                            <a class="link2 " href="{{route('DeleteProduct',$product->id)}}">حذف</a>--}}


                                    </div>

                                </div>
                            @endforeach
                        @endif
                    </div>


                </section>
            </div>
        </div>

    </section>

</div>
<!-- The Modal Add Category -->
<div>

    <form id="formadd" action="{{ route('AddProduct') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade p-0" id="myModal" style="verflow-y: hidden;">
            <div class="modal-dialog mr-auto ml-auto mt-0 mb-0 "
                 style="height: 100%;display: flex;justify-content: center;align-items: center;">
                <div class="modal-content m-0">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h4 class="modal-title " style="margin-left: auto;position: relative;width: 100%;">أدخل
                            منتج </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body p-sm-3 p-2 p-lg-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div style="width: 100%;height: 30px">
                                    <h5 class="text-center">أضف صورة رئيسية</h5>
                                </div>
                                <div class="contain_Enterimg">
                                    <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">

                                    <div class="form-group m-auto">
                                        <img class="emterimgproduct1 m-auto" src="{{asset('f_assets/svg/square.svg')}}"
                                             style="height: auto;"
                                             onclick="triggerClick()" id="profileDisplay">
                                        <input class="inputimg" type="file" name="image_product" id="porfileImage"
                                               onchange="displayImage(this)" class="form-control" accept="image/*"
                                               style="display:none">
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">
                                <div id="cont">
                                    <div class="continput form-group">
                                        <div class="span_img">
                                            <img class="icon_model"
                                                 src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}" width="10">
                                            <span class="products_model">اسم المنتج</span>
                                        </div>
                                        <input class="Enterprodect" type="text" name="name" id="name"
                                               value="{{old('name')}}" required>
                                    </div>
                                    <div class="continput form-group">
                                        <div class="span_img">
                                            <img class="icon_model"
                                                 src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}" width="10">
                                            <span class="products_model">شرح عن المنتج </span>
                                        </div>
                                        <input class="Enterprodect" type="text" name="description" id="description"
                                               value="{{old('description')}}">

                                    </div>
                                    <div class="continput form-group">
                                        <div class="span_img">
                                            <img class="icon_model"
                                                 src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}" width="10">
                                            <span class="products_model">
                                                سعر المنتج
                                            </span>
                                        </div>
                                        <input class="Enterprodectnumber" placeholder="0" type="number"
                                               title="الرجاء ملئ الحقل بارقام فقط" name="price" id="price"
                                               value="{{old('price')}}" required>

                                    </div>
                                    {{--                                    <button class="btn1" id="btn1" onclick="createProduct()">حفظ</button>--}}


                                </div>

                            </div>
                            <div class="col-12" style="margin-top: 2rem;">
                                <button type="button" data-toggle="modal" id="btn1"
                                        data-target="#modelemgs" data-dismiss="modal"
                                        class="btn1 btn-default btn-next">التالي
                                </button>
                                <button type="button" class="btn1" id="btn1" style="float:right"
                                        data-dismiss="modal">رجوع

                                </button>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="modal fade" id="modelemgs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog solve" style="max-width: max-content;">
                <div class="modal-content" id="modal-content_img">
                    <div class="modal-header" style="padding: 0;">
                        <h4 class="modal-title text-center">إضافة منتج</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 2</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">
                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2" src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimg1()" id="profileDisplayimg1">
                                    <input class="inputimg" type="file" name="image1" id="porfileImage1"
                                           onchange="displayImage1(this)" class="form-control"
                                           style="display:none">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 3</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">

                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2" src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimg2()" id="profileDisplayimg2">
                                    <input class="inputimg" type="file" name="image2" id="porfileImage2"
                                           onchange="displayImage2(this)" class="form-control"
                                           style="display:none">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 4</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">
                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2" src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimg4()" id="profileDisplayimg4">
                                    <input class="inputimg" type="file" name="image3" id="porfileImage4"
                                           onchange="displayImage4(this)" class="form-control"
                                           style="display:none">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 5</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">
                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2" src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimg5()" id="profileDisplayimg5">
                                    <input class="inputimg" type="file" name="image4" id="porfileImage5"
                                           onchange="displayImage5(this)" class="form-control"
                                           style="display:none">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="contain_button">
                        <button type="submit" class="btn btn-primary" id="btn3" onclick="createProduct()">ارسال</button>
                        <p class="containue">يمكنك عدم إضافة صور و الارسال</p>
                        <button type="button" id="btn2" style="float: left;" data-dismiss="modal">
                            اغلاق
                        </button>
                    </div>
                </div>


            </div>

        </div>
    </form>
</div>


<!-- The Modal Edit Category -->
<div>
    <form method="POST" action="{{route('EditProduct')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PATCH')
        <div class="modal fade " id="myModalEdit" role="dialog" tabindex="-1" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog mr-auto ml-auto mt-0 mb-0"
                 style="height: 100%;display: flex;justify-content: center;align-items: center;">
                <div class="modal-content m-0">
                    <!-- Modal Header -->
                    <div class="modal-header text-center m-0">
                        <h4 class="modal-title" style="margin-left: auto;position: relative;width: 100%;">تعديل
                            المنتج </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body p-sm-3 p-2 p-lg-4">
                        {{--<h1>{{$product}}</h1>--}}
                        <div class="row">
                            <input hidden class="form-control input proId " id="id" name="id" type="text">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12 ">
                                <div style="width: 100%;height: 30px">
                                    <h5 class="text-center">أضف صورة رئيسية</h5>
                                </div>
                                <div class="contain_Enterimg">

                                    <div class="form-group  m-auto">
                                        <img class="emterimgproduct1 proImage_product m-auto"
                                             src="{{asset('f_assets/svg/square.svg')}}" style="height: auto;"
                                             onclick="triggerClickedit()" id="profileDisplayedit">

                                        <input class=" form-control inputimg " type="file" name="image_product"
                                               id="porfileImageedit"
                                               onchange="displayImageedit(this)" accept="image/*"
                                               style="display:none">
                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">

                                <div class="continput form-group">
                                    <div class="span_img">
                                        <img class="icon_model" src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}"
                                             width="10">
                                        <span class="products_model">اسم المنتج</span>
                                    </div>
                                    <input class="Enterprodect proName  " type="text" name="name">


                                </div>
                                <div class="continput form-group">
                                    <div class="span_img">
                                        <img class="icon_model" src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}"
                                             width="10">
                                        <span class="products_model">شرح عن المنتج </span>
                                    </div>
                                    <input class="Enterprodect proDescription" type="text"
                                           name="description" id="description">
                                </div>
                                <div class="continput form-group">
                                    <div class="span_img">
                                        <img class="icon_model" src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}"
                                             width="10">
                                        <span class="products_model">
                                                سعر المنتج
                                            </span>
                                    </div>
                                    <input class=" Enterprodect proPrice" type="text" name="price"
                                           id="price">

                                </div>
                                {{--                                    <button class="btn1" id="btn1" onclick="createProduct()">حفظ</button>--}}


                            </div>
                            <div class="col-12" style="margin-top: 2rem;">
                                <button type="submit" id="btn1" data-dismiss="modal" data-toggle="modal"
                                        data-target="#Modal_Editimg" class="btn1 btn-default btn-next">التالي
                                </button>
                                <button class="btn1" id="btn1" style="float: right;padding-left: 20px"
                                        data-dismiss="modal">
                                    الغاء
                                </button>
                            </div>

                        </div>

                    </div>

                </div>
                <input type="hidden" value="{{url('/').'/'}}" id="url" name="url">
            </div>
        </div>


        <div class="modal fade" id="Modal_Editimg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog solve" style="max-width: max-content;">

                <div class="modal-content" id="modal-content_img">
                    <div class="modal-header" style="padding: 0;">
                        <h4 class="modal-title text-center">تعديل منتج</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 2</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">
                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2 proImage1"
                                         src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimgedit1()"
                                         id="profileDisplayimgedit1">

                                    <input class=" form-control inputimg" type="file" name="image1"
                                           id="porfileImageedit1"
                                           onchange="displayImageedit1(this)"
                                           style="display:none">
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 3</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">
                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2 proImage2"
                                         src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimgedit2()"
                                         id="profileDisplayimgedit2">
                                    <input class=" form-control inputimg" type="file" name="image2"
                                           id="porfileImageedit2"
                                           onchange="displayImageedit2(this)"
                                           style="display:none">
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 4</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">
                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2 proImage3"
                                         src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimgedit4()"
                                         id="profileDisplayimgedit4">
                                    <input class=" form-control inputimg" type="file" name="image3"
                                           id="porfileImageedit4"
                                           onchange="displayImageedit4(this)"
                                           style="display:none">
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 5</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">
                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2 proImage4"
                                         onclick="triggerClickimgedit5()"
                                         src="{{asset('f_assets/svg/square.svg')}}"
                                         id="profileDisplayimgedit5">
                                    <input class=" form-control inputimg" type="file" name="image4"
                                           id="porfileImageedit5"
                                           onchange="displayImageedit5(this)"
                                           style="display:none">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="contain_button">
                        <button onclick="createProduct()" id="btn3" class="btn btn-primary">ارسال</button>
                        <p class="containue">يمكنك عدم إضافة صور و الارسال</p>
                        <button type="button" id="btn2" style="float: left;" data-dismiss="modal">
                            اغلاق
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>

</div>
<!-- The Modal offer Category -->
<div>
    <form method="POST" action="{{route('OfferProduct')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal fade p-0" id="myModalOffer" role="dialog" tabindex="-1" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog mr-auto ml-auto mt-0 mb-0"
                 style="height: 100%;display: flex;justify-content: center;align-items: center;">
                <div class="modal-content m-0" id="modal-content1">
                    <!-- Modal Header -->
                    <div class="modal-header text-center">
                        <h4 class="modal-title " style="margin-left: auto;position: relative;width: 100%;">إضافة المنتج
                            الى العروض </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body p-sm-3 p-2 p-lg-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div style="width: 100%;height: 30px">
                                    <h5 class="text-center">أضف صورة رئيسية</h5>
                                </div>
                                <div class="contain_Enterimg">

                                    <div class="form-group m-auto">
                                        <img class="emterimgproduct1 proImage_product m-auto"
                                             src="{{asset('f_assets/svg/square.svg')}}"
                                             onclick="triggerClickOffer()" id="profileDisplayOffer">
                                        <input class="inputimg" type="file" name="image_product"
                                               id="porfileImageOffer" accept="image/*"
                                               onchange="displayImageOffer(this)" class="form-control"
                                               style="display:none">

                                    </div>


                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-12">

                                <input hidden class="form-control input proId " id="id" name="id" type="text">
                                <div id="cont">
                                    <div class="continput form-group">
                                        <div class="span_img">
                                            <img class="icon_model"
                                                 src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}" width="10">
                                            <span class="products_model">اسم المنتج</span>
                                        </div>
                                        <input class="Enterprodect proName" type="text" name="name" id="name"
                                               value="{{old('name')}}">
                                    </div>
                                    <div class="continput form-group">
                                        <div class="span_img">
                                            <img class="icon_model"
                                                 src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}" width="10">
                                            <span class="products_model">شرح عن المنتج </span>
                                        </div>
                                        <input class="Enterprodect proDescription" type="text" name="description"
                                               id="description"
                                               value="{{old('description')}}">

                                    </div>
                                    <div class="continput form-group row" style="display:flex">
                                        <div class="col-sm-6 col-12" style="padding:0;">
                                            <div class="span_img">
                                                <img class="icon_model"
                                                     src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}" width="10">
                                                <span class="products_model">السعر قبل الحسم</span>
                                            </div>
                                            <input class="Enterprodectnumber proPrice" placeholder="0" type="number"
                                                   title="الرجاء ملئ الحقل بارقام فقط" name="price" id="price">
                                        </div>
                                        <div class="col-sm-6 col-12" style="padding:0;">
                                            <div class="span_img">
                                                <img class="icon_model"
                                                     src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}" width="10">
                                                <span class="products_model">
                                                السعر بعد الحسم
                                            </span>
                                            </div>
                                            <input class="Enterprodectnumber proPrice_new" placeholder="0" type="number"
                                                   title="الرجاء ملئ الحقل بارقام فقط" name="price_new" id="price_new">
                                        </div>


                                    </div>
                                    <div class="continput" style="direction: rtl;text-align: right;">
                                        <img src="{{asset('f_assets/svg/الايقونة البرتقانية.svg')}}" width="10">
                                        <label for="sel1">أختر مدة العرض كعدد أيام</label>
                                        <select class="form-control proDaysOffer" id="sel1" name="sellist1" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>

                                        <span class="span1">(أقصى حد 7 أيام)</span>

                                    </div>
                                    {{--                                    <button id="btn">حفظ</button>--}}

                                </div>


                            </div>
                            <div class="col-12" style="margin-top: 2rem;">
                                <button type="submit" id="btn1" data-dismiss="modal" data-toggle="modal"
                                        data-target="#Modal_offer1" class="btn1 btn-default btn-next">التالي
                                </button>
                                <button id="btn" style="float: right;" data-dismiss="modal">إغلاق</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="Modal_offer1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog solve" style="max-width: max-content;">

                <div class="modal-content" id="modal-content_img">
                    <div class="modal-header" style="padding: 0;">
                        <h4 class="modal-title">إضافة المنتج الى العروض</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 2</h6>
                            </div>

                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2 proImage1"
                                         src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimgOffer1()" id="profileDisplayimgOffer1">
                                    <input class="inputimg" type="file" name="image_product1"
                                           id="porfileImageOffer1"
                                           onchange="displayImageOffer1(this)" class="form-control"
                                           style="display:none">
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 3</h6>
                            </div>

                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2 proImage2"
                                         src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimgOffer2()" id="profileDisplayimgOffer2">
                                    <input class="inputimg" type="file" name="image_product2"
                                           id="porfileImageOffer2"
                                           onchange="displayImageOffer2(this)" class="form-control"
                                           style="display:none">
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 4</h6>
                            </div>

                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct2  proImage3"
                                         src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimgOffer3()" id="profileDisplayimgOffer3">
                                    <input class="inputimg" type="file" name="image_product3"
                                           id="porfileImageOffer3"
                                           onchange="displayImageOffer3(this)" class="form-control"
                                           style="display:none">
                                </div>


                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="text-center" style="width: 100%;height: 30px">
                                <h6>صورة 5</h6>
                            </div>
                            <input hidden id="cat_id" name="cat_id" value="{{$cat_id}}">
                            <div class="contain_Enterimg">
                                <div class="form-group" style="margin: 0;">
                                    <img class="emterimgproduct1 proImage4"
                                         src="{{asset('f_assets/svg/square.svg')}}"
                                         onclick="triggerClickimgOffer4()" id="profileDisplayimgOffer4">
                                    <input class="inputimg" type="file" name="image_product4"
                                           id="porfileImageOffer4"
                                           onchange="displayImageOffer4(this)" class="form-control"
                                           style="display:none">
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="contain_button">
                        <button onclick="createProduct()" id="btn3" class="btn btn-primary">ارسال</button>
                        <p class="containue">يمكنك عدم إضافة صور و الارسال</p>
                        <button type="button" id="btn2" style="float: left;" data-dismiss="modal">
                            اغلاق
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>


<script type="text/javascript">

    $(".code-dialog").click(function () {
            // alert("I want this to appear after the modal has opened!");
            console.log('aa');
            var base_path = $("#url").val();
            var id = $(this).attr('data-id');
            console.log(id);
            // var id = $(event.relatedTarget).attr('data-id');
            var name = $(this).attr('data-name');
            // console.log(name);
            var description = $(this).attr('data-description');
            var price = $(this).attr('data-price');
            var image_product = $(this).attr('data-image-product');
            console.log(base_path);
            var image1 = $(this).attr('data-image1');
            var image2 = $(this).attr('data-image2');
            var image3 = $(this).attr('data-image3');
            var image4 = $(this).attr('data-image4');
            var image5 = $(this).attr('data-image5');
            $('#myModalEdit').find('.proId').val(id);
            $('#myModalEdit').find('.proName').val(name);
            $('#myModalEdit').find('.proDescription').val(description);
            $('#myModalEdit').find('.proPrice').val(price);
            console.log(image2)
            if (image_product != base_path) {
                $('#myModalEdit').find('.proImage_product').attr("src", image_product);
            }
            if (image1 != base_path) {
                $('#Modal_Editimg').find('.proImage1').attr("src", image1);
            }
            if (image2 != base_path) {
                console.log(image2)
                $('#Modal_Editimg').find('.proImage2').attr("src", image2);
            }
            if (image3 != base_path) {
                $('#Modal_Editimg').find('.proImage3').attr("src", image3);
            }
            if (image4 != base_path) {
                $('#Modal_Editimg').find('.proImage4').attr("src", image4);
            }
            if (image5 != base_path) {
                $('#Modal_Editimg').find('.proImage5').attr("src", image5);
            }
            console.log('aaggf');

        }
    )
    ;


    $(".code-dialog-offer").click(function () {
            // alert("I want this to appear after the modal has opened!");
            console.log('offer');
            var base_path = $("#url").val();
            var id = $(this).attr('data-id');
            console.log(id);
            // var id = $(event.relatedTarget).attr('data-id');
            var name = $(this).attr('data-name');
            // console.log(name);
            var description = $(this).attr('data-description');
            var price = $(this).attr('data-price');
            var price_new = $(this).attr('data-price_new');
            var Offer = $(this).attr('data-days-offer');
            console.log(Offer);
            var image_product = $(this).attr('data-image-product');
            console.log(base_path);
            var image1 = $(this).attr('data-image1');
            var image2 = $(this).attr('data-image2');
            var image3 = $(this).attr('data-image3');
            var image4 = $(this).attr('data-image4');
            var image5 = $(this).attr('data-image5');
            $('#myModalOffer').find('.proId').val(id);
            $('#myModalOffer').find('.proName').val(name);
            $('#myModalOffer').find('.proDescription').val(description);
            $('#myModalOffer').find('.proPrice').val(price);
            $('#myModalOffer').find('.proPrice_new').val(price_new);
            document.getElementById('sel1').value = Offer;


            console.log(image2)
            if (image_product != base_path) {
                $('#myModalOffer').find('.proImage_product').attr("src", image_product);
            }
            if (image1 != base_path) {
                $('#Modal_offer1').find('.proImage1').attr("src", image1);
            }
            if (image2 != base_path) {
                console.log(image2)
                $('#Modal_offer1').find('.proImage2').attr("src", image2);
            }
            if (image3 != base_path) {
                $('#Modal_offer1').find('.proImage3').attr("src", image3);
            }
            if (image4 != base_path) {
                $('#Modal_offer1').find('.proImage4').attr("src", image4);
            }
            if (image5 != base_path) {
                $('#Modal_offer1').find('.proImage5').attr("src", image5);
            }
            console.log('aaggf');

        }
    )
    ;

    function fetch_products_data(cat_id) {
        console.log('pro');
        console.log(cat_id);
        // var stateObj = {foot: "bar"};
        // history.pushState(stateObj, "page 2", cat_id);
        var url = '{{ route('productByCat',":cat_id") }}';
        url = url.replace(':cat_id', cat_id);

        $.ajax({
            method: "GET",
            data: {cat_id: cat_id},
            // dataType:'json',
            url: url,
            success: function (data) {
                $('#products').html(data);
            }

        });

    }

    function createProduct() {
        console.log('pro');
        console.log($("formadd").serialize());
        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            async: false,
            method: "POST",
            data: $("formadd").serialize(),
            // dataType:'json',
            url: $('formadd').attr('action'),
            success: function (data) {
                console.log(data);
                $('#products').html(data);
            }
        });
    }

    // $(document).ready(function () {
    //     console.log('doc');
    //     // $('#myModalEdit').on('show.bs.modal', function (event) {
    //     //     console.log('aa');
    //     //     var id = $(event.relatedTarget).attr('data-id');
    //     //     var name = $(event.relatedTarget).attr('data-name');
    //     //     console.log(name);
    //     //     var description = $(event.relatedTarget).attr('data-description');
    //     //     var price = $(event.relatedTarget).attr('data-price');
    //     //     var image_product = $(event.relatedTarget).attr('data-image-product');
    //     //     var image1 = $(event.relatedTarget).attr('data-image1');
    //     //     var image2 = $(event.relatedTarget).attr('data-image2');
    //     //     var image3 = $(event.relatedTarget).attr('data-image3');
    //     //     var image4 = $(event.relatedTarget).attr('data-image4');
    //     //     var image5 = $(event.relatedTarget).attr('data-image5');
    //     //     $(this).find('.proId').val(id);
    //     //     $(this).find('.proName').val(name);
    //     //     $(this).find('.proDescription').val(description);
    //     //     $(this).find('.proPrice').val(price);
    //     //     $(this).find('.proImage_product').attr("src", image_product);
    //     //     $(this).find('.proImage1').attr("src", image1);
    //     //     $(this).find('.proImage2').attr("src", image2);
    //     //     $(this).find('.proImage3').attr("src", image3);
    //     //     $(this).find('.proImage4').attr("src", image4);
    //     //     $(this).find('.proImage5').attr("src", image5);
    //     //     console.log('aaggf');
    //     //
    //     // });
    // });

    function myFunction() {
        var men = document.getElementById("dropdown-content");
        if (men.style.display == 'block') {
            men.style.display = 'none';
        } else {
            men.style.display = 'block';
        }

    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";

    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";

    }

    function myFunction1() {
        var men = document.getElementById("divedit");
        if (men.style.display == 'block') {
            men.style.display = 'none';
        } else {
            men.style.display = 'block';
        }

    }

    function myFunction14() {
        //heade
        var color = document.getElementById("color").value;
        console.log(color);
        if (color == null) color = 'blue'
        var men = document.getElementById("header");
        men.style.background = color;
        //nav
        var men1 = document.getElementById("mySidenav");
        men1.style.background = color;
    }

    function Functionlink() {
        var men = document.getElementById("myDropdownlink");
        if (men.style.display == 'block') {
            men.style.display = 'none';
        } else {
            men.style.display = 'block';
        }

    }
</script>

<script>


    $(".continput input").on("focus", function () {
        $(this).addClass("focus");
    });


    $(".continput input").on("blur", function () {
        if ($(this).val() == "")
            $(this).removeClass("focus");
    });

    ///////////ِADD///////////////////////////////////////////////////////////////
    // proimg
    function triggerClick() {
        document.querySelector('#porfileImage').click();

    }

    function displayImage(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    // ////////////////////img1
    function triggerClickimg1() {
        document.querySelector('#porfileImage1').click();

    }

    function displayImage1(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimg1').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ////////img 2
    function triggerClickimg2() {
        document.querySelector('#porfileImage2').click();

    }

    function displayImage2(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimg2').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////////img3
    function triggerClickimg3() {
        document.querySelector('#porfileImage3').click();

    }

    function displayImage3(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimg3').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////img4
    function triggerClickimg4() {
        document.querySelector('#porfileImage4').click();

    }

    function displayImage4(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimg4').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////////////img5
    function triggerClickimg5() {
        document.querySelector('#porfileImage5').click();

    }

    function displayImage5(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimg5').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ///////////////////img 6
    function triggerClickimg6() {
        document.querySelector('#porfileImage6').click();

    }

    function displayImage6(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimg6').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////


    ////////////////////Edit//////////////////////////////////////////////////////
    // proeditimg
    function triggerClickedit() {
        document.querySelector('#porfileImageedit').click();

    }

    function displayImageedit(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayedit').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    // ////////////////////img1
    function triggerClickimgedit1() {
        document.querySelector('#porfileImageedit1').click();

    }

    function displayImageedit1(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgedit1').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ////////img 2
    function triggerClickimgedit2() {
        document.querySelector('#porfileImageedit2').click();

    }

    function displayImageedit2(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgedit2').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////////img3
    function triggerClickimgedit3() {
        document.querySelector('#porfileImageedit3').click();

    }

    function displayImageedit3(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgedit3').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////img4
    function triggerClickimgedit4() {
        document.querySelector('#porfileImageedit4').click();

    }

    function displayImageedit4(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgedit4').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////////////img5
    function triggerClickimgedit5() {
        document.querySelector('#porfileImageedit5').click();

    }

    function displayImageedit5(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgedit5').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ///////////////////img 6
    function triggerClickimgedit6() {
        document.querySelector('#porfileImageedit6').click();

    }

    function displayImageedit6(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgedit6').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    /////////////////Offer///////////////////////////////////////////////////////
    // proeditimg
    function triggerClickOffer() {
        document.querySelector('#porfileImageOffer').click();

    }

    function displayImageOffer(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayOffer').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    // ////////////////////img1
    function triggerClickimgOffer1() {
        document.querySelector('#porfileImageOffer1').click();

    }

    function displayImageOffer1(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgOffer1').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ////////img 2
    function triggerClickimgOffer2() {
        document.querySelector('#porfileImageOffer2').click();

    }

    function displayImageOffer2(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgOffer2').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////////img3
    function triggerClickimgOffer3() {
        document.querySelector('#porfileImageOffer3').click();

    }

    function displayImageOffer3(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgOffer3').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////img4
    function triggerClickimgOffer4() {
        document.querySelector('#porfileImageOffer4').click();

    }

    function displayImageOffer4(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgOffer4').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    //////////////////img5
    function triggerClickimgOffer5() {
        document.querySelector('#porfileImageOffer5').click();

    }

    function displayImageOffer5(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgOffer5').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ///////////////////img 6
    function triggerClickimgOffer6() {
        document.querySelector('#porfileImageOffer6').click();

    }

    function displayImageOffer6(e) {
        console.log('aa');
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.querySelector('#profileDisplayimgOffer6').setAttribute('src', e.target.result);

            }
            reader.readAsDataURL(e.files[0]);
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
</script>


</body>
</html>
