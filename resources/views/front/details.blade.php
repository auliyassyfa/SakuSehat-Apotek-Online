<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
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
        Detail Produk
      </p>
    </section>

    <img src="{{Storage::url($product->photo)}}" class="h-[220px] w-auto mx-auto relative z-10" alt="">
    <section class="bg-blue-100 rounded-t-[80px] pt-[60px] px-6 pb-10 -mt-9 flex flex-col gap-5 max-w-[425px] mx-auto">
      <div>
        <div class="flex items-center justify-between">
          <div class="flex flex-col gap-1">
            <p class="font-bold text-[22px]">
              {{$product->name}}
            </p>
            <div class="flex items-center gap-1.5">
              <img src="{{Storage::url($product->category->icon)}}" class="size-[30px]" alt="">
              <p class="font-semibold text-balance">
                {{$product->category->name}}
              </p>
            </div>
          </div>
          <div class="flex items-center gap-1 mt-7">
            <img src="{{asset('assets/svgs/star.svg')}}" class="size-6" alt="">
            <p class="font-semibold text-balance">
              5/5
            </p>
          </div>
        </div>
        <p class="mt-3.5 text-base leading-7">
          {{$product->about}}
        </p>
      </div>

      <!-- Price and Add to cart -->
      <div class="flex items-center justify-between mt-10">
        <div class="flex flex-col gap-0.5">
          <p class="text-lg min-[350px]:text-2xl font-bold">
            Rp {{$product->price}}
          </p>
        </div>
        <form action="{{route('carts.store', $product->id)}}" method="POST">
          @csrf
          <button type="submit" class="inline-flex w-max text-rose-200 font-bold text-base bg-blue-900 rounded-full px-[15px] py-3 justify-center items-center whitespace-nowrap">>
            Tambah ke Keranjang
          </button> 
        </form>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="{{asset('scripts/sliderConfig.js')}}" type="module"></script>
  </body>

</html>