<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>
    <link rel="shortcut icon" href="{{asset('assets/images/saku.png')}}" type="image/x-icon">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-slate-50">
    <!-- Topbar -->
    <section class="relative flex items-center justify-between gap-5 wrapper">
      <a href="{{route('front.index')}}" class="p-2 bg-rose-100 rounded-full">
        <img src="{{asset('assets/svgs/ic-arrow-left.svg')}}" class="size-5" alt="">
      </a>
      <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
        Search Products
      </p>
    </section>

    <!-- Form Search -->
    <section class="wrapper">
      <form action="{{route('front.search')}}" method="GET" id="searchForm" class="w-full">
        <input type="text" name="keyword" id="searchProduct"
          class="block w-full py-3.5 pl-4 pr-10 rounded-[50px] font-semibold placeholder:text-grey border border-slate-200 shadow-md placeholder:font-normal text-black text-base bg-no-repeat bg-[calc(100%-16px)] bg-[url('/public/assets/svgs/ic-search.svg')] focus:ring-2 focus:ring-primary focus:outline-none focus:border-none transition-all"
          placeholder="Search by product name" value="{{$keyword}}">
      </form>
    </section>

    <!-- Search Results -->
    <section class="wrapper flex flex-col gap-2.5">
      <p class="text-base font-bold">
        Results
      </p>
      <div class="flex flex-col gap-4">
         @forelse ($products as $product)
        <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
          <img src="{{Storage::url($product->photo)}}" class="w-full max-w-[70px] max-h-[70px] object-contain"
            alt="">
          <div class="flex flex-wrap items-center justify-between w-full gap-1">
            <div class="flex flex-col gap-1">
              <a href="{{route('front.product.details',$product->slug)}}" class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                {{$product->name}}
              </a>
              <p class="text-sm text-grey">
                Rp {{$product->price}}
              </p>
            </div>
            <div class="flex">
              <img src="{{asset('assets/svgs/star.svg')}}" class="size-[18px]" alt="">
              <img src="{{asset('assets/svgs/star.svg')}}" class="size-[18px]" alt="">
              <img src="{{asset('assets/svgs/star.svg')}}" class="size-[18px]" alt="">
              <img src="{{asset('assets/svgs/star.svg')}}" class="size-[18px]" alt="">
              <img src="{{asset('assets/svgs/star.svg')}}" class="size-[18px]" alt="">
            </div>
          </div>
        </div>
        @empty
        <p>produk tidak ditemukan.</p>
        @endforelse
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/public/scripts/searchProductListener.js" type="module"></script>
  </body>

</html>