@extends('front.layouts.app')
@section('title','Coding Arabic')
@section('content')
<main class="pt-4 text-center">
    <!-- Hero Section Start -->
  
    <!-- Products Section End -->

    <!-- Categories Section Start -->
    <div class="section-container mb-5 text-center">
      <div class="categories row gx-4">
          @foreach ($categories as $category)
              <div class="col-md-2 p-2">
                  <div class="p-4 border rounded-3">
                    <p class="text-center">{{ $category->name }}</p>
                      <img height="200px" src="{{ asset('/storage/images/products/'.$category->image) }}" alt="">
                      <a href="{{ route('category.products', $category->id) }}">
                        <button class="m-2 products__btn py-2 px-3 rounded-1">تسوق الأن</button>
                    </a>
                    </div>
              </div>
          @endforeach
      </div>
    </div>
  
  
    <!-- Categories Section End -->

 
    <!-- Best Sales Section End -->

    <!-- Newest Section Start -->
    <section class="section-container mb-5">
      <div class="products__header mb-4 d-flex align-items-center justify-content-between">
        <h4 class="m-0">الاكثر مبيعا</h4>
        <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
      </div>
    </section>
    <section class="section-container mb-5">
      <div class="products__header mb-4 d-flex align-items-center justify-content-between">
        <h4 class="m-0">وصل حديثا</h4>
        <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
      </div>
    </section>
    <!-- Newest Section End -->
  </main>
  @stop