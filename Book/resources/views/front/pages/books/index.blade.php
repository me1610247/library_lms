@extends('front.layouts.app')
@section('title','Books')
@section('content')
<main>
    <div
      class="page-top d-flex justify-content-center align-items-center flex-column text-center"
    >
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>المتجر</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="index.html">الرئيسية</a> /
          <span class="text-gray">المتجر</span>
        </div>
      </div>
    </div>

    <div class="section-container d-block d-lg-flex gap-5 shop mt-5 pt-5">
      <div class="shop__filter mb-4">
        <div class="mb-4">
          <h6 class="shop__filter-title">بتدور علي ايه؟</h6>
          <form action="">
            <div class="filter__search position-relative">
              <input
                class="w-100 py-1 ps-2"
                type="text"
                placeholder="بتدور علي ايه؟"
              />
              <div
                class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center"
              >
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
            </div>
          </form>
        </div>
        <div>
          <h6 class="shop__filter-title mb-3">التصنيف</h6>
          <form action="">
            <div class="filter__size">
              <div class="mb-3">
                <input type="checkbox" name="filter-size" id="english-book" />
                <label for="english-book">English Books</label>
              </div>
              <div class="mb-3">
                <input type="checkbox" name="filter-size" id="english-book" />
                <label for="english-book">كتب عربية - English Books</label>
              </div>
            </div>
            <div class="mb-3">
              <input type="submit" class="primary-button" value="ابحث" />
            </div>
          </form>
        </div>
      </div>
      <div class="shop__products w-100">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <p class="m-0">عرض 1 - 40 من أصل 144 نتيجة</p>
          <select
            class="shop__category border-0 border-bottom bg-transparent"
          >
            <option selected disabled>اختر الترتيب</option>
            <option value="">ترتيب حسب الشهرة</option>
            <option value="">ترتيب حسب الأحدث</option>
            <option value="">ترتيب حسب: الأدني سعرا للأعلي</option>
            <option value="">ترتيب حسب: الأعلي سعرا للأدني</option>
          </select>
        </div>
        <div class="section-container mb-5 text-center">
          <div class="categories row gx-4">
              @foreach ($products as $product)
                  <div class="col-md-3 p-2">
                      <div class="p-4 border rounded-3">
                          <p class="text-center">Name : {{ $product->title }}</p>
                          <img height="200px" src="{{ asset('/storage/images/products/'.$product->image) }}" alt="">
                          <p class="text-success text-center m-2">Price : {{ $product->price }}</p>
                          <button class="m-2 products__btn py-2 px-3 rounded-1">اشتري الأن</button>
                      </div>
                  </div>
              @endforeach
          </div>
      </div>
      <div class="card-footer clearfix">
        <div class="float-right">
          {{ $products->links('pagination::bootstrap-4', ['class' => 'hide-arrows']) }}
        </div>
      </div>
      </div>
    </div>
  </main>
@stop