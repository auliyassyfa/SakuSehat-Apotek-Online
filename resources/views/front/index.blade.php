<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Landing Page</title>
		<link rel="shortcut icon" href="{{asset('assets/images/saku.png')}}" type="image/x-icon">
		<link rel="stylesheet" href="{{asset('css/main.css')}}">
		<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
		<script src="https://cdn.tailwindcss.com"></script>
	</head>

	<body class="bg-slate-50">
		<!-- Topbar -->
		<div class="bg-rose-200 w-full max-w-[400px] mx-auto rounded-3xl">
			<section class=" flex items-center justify-between gap-5 wrapper pt-3">
				<div class="flex items-center gap-3">
					<div class=flex items-center">
						<img src="{{asset('assets/images/logosakusehat.png')}}" class="w-14" alt="">
					</div>
					<div class="">
						<p class="text-base font-semibold capitalize text-primary">
							
						</p>
					</div>
				</div>
				<div class="flex items-center gap-[10px]">
					<a href="{{route('carts.index')}}">
						<img src="{{asset('assets/images/cart.png')}}" class="size-7" alt="">
					</a>
				</div>
			</section>

			<!-- Header -->
			<section class="wrapper flex flex-col gap-2.5 items-center justify-center pb-5">
				<p class="text-3xl font-extrabold text-center text-blue-900">
					Obat Mudah, <br>
					Hidup Lebih Sehat
				</p>
				<!-- search bar -->
				<form action="{{route('front.search')}}" method="GET" id="searchForm" class="w-full pt-5">
					<input type="text" name="keyword" id="searchProduct"
						class="block w-full py-3.5 pl-4 pr-10 rounded-[50px] font-semibold placeholder:text-grey placeholder:font-normal text-black text-base bg-no-repeat bg-[calc(100%-16px)] bg-[url('{{asset('assets/svgs/ic-search.svg')}}')] focus:ring-2 focus:ring-primary focus:outline-none focus:border-none transition-all"
						placeholder="cari produk disini">
				</form>
			</section>
		</div>

		<!-- Floating navigation -->
		<nav class="fixed z-50 bottom-[30px] bg-blue-900 border border-blue-900 rounded-[50px] pt-[18px] px-10 left-1/2 -translate-x-1/2 w-80">
			<div class="flex items-center justify-center gap-10 flex-nowrap">
				<a href="#" class="flex flex-col items-center justify-center gap-1 px-1 group is-active">
					<img src="{{asset('assets/images/home1.png')}}" class="w-7" alt="">
					<p
						class=" pb-2 text-xs text-center font-semibold text-white ">
						Home
					</p>
				</a>
				<a href="{{route('product_transactions.index')}}" class="flex flex-col items-center justify-center gap-1 px-1 group">
					<img src="{{asset('assets/images/shopping-bag2.png')}}" class="w-7" alt="">
					<p
						class=" pb-2 text-xs text-center font-semibold text-white">
						Orders
					</p>
				</a>
				<a href="{{route('dashboard')}}" class="flex flex-col items-center justify-center gap-1 px-1 group">
					<img src="{{asset('assets/images/user2.png')}}" class="w-8"
						alt="">
					<p
						class="pb-3 text-xs text-center font-semibold text-white">
						Profile
					</p>
				</a>
			</div>
		</nav>

		<!-- Your last order -->
		<section class="wrapper">
			<div
				class="flex justify-between gap-3 items-center bg-blue-200 py-1 px-4 rounded-2xl relative bg-left bg-no-repeat bg-cover ">
				<p class="text-base font-bold text-blue-900">
					Apotek Online Andal, <br>
					Teman Sehat Keluarga.
				</p>
				<img src="{{asset('assets/images/dokter.png')}}" class="w-[130px]" alt="">
			</div>
		</section>

		<!-- Categories -->
		<section class="wrapper !px-0 flex flex-col gap-2.5">
			<p class="px-4 text-base font-bold">
				Kategori
			</p>
			<div id="categoriesSlider" class="relative">
				<!-- Diabetes -->
				@forelse ($categories as $category)
					<div class="inline-flex gap-2.5 items-center py-3 px-3.5 relative bg-white rounded-xl border border-slate-200 hover:border-blue-900 mr-4">
						<img src="{{Storage::url($category->icon)}}" class="size-10" alt="">
						<a href="{{route('front.product.category', $category)}}" class="text-base font-semibold truncate stretched-link">
							{{$category->name}}
						</a>
					</div>
				@empty
				@endforelse
			</div>
		</section>

		<!-- Latest Products -->
		<section class="wrapper !px-0 flex flex-col gap-2.5">
			<p class="px-4 text-base font-bold">
				Produk Terbaru
			</p>
			<div class="grid grid-cols-2 gap-x-4 gap-y-4 px-4 mx-auto ml-5">
				<!-- produk -->
				@forelse ($products as $product)
				<div class="rounded-2xl border bg-white border-slate-200 shadow-md hover:shadow-lg hover:border-blue-900 py-3.5 pl-4 pr-[22px] inline-flex flex-col gap-4 items-start mr-4 relative w-[158px]">
					<img src="{{Storage::url($product->photo)}}" class="h-[100px] w-full object-contain" alt="">
					<div>
						<a href="{{route('front.product.details',$product->slug)}}" class="text-base font-semibold w-[120px] truncate stretched-link block">
							{{$product->name}}
						</a>
						<p class="text-sm truncate text-grey">
							{{$product->price}}
						</p>
					</div>
				</div>
				@empty
				<p>belum ada produk tersedia.</p>
				@endforelse
			</div>
		</section>

		<!-- Explore -->
		<section class="wrapper">
			<div class="bg-lilac py-3.5 px-5 rounded-2xl relative bg-right-bottom bg-no-repeat bg-auto">
				<img src="{{asset('assets/svgs/cloud.svg')}}" class="-ml-1.5 mb-1.5" alt="">
				<div class="flex flex-col gap-4 mb-[23px]">
					<p class="text-base font-bold">
						Explore great doctors <br>
						for your better life
					</p>
					<a href="#"
						class="rounded-full bg-white text-primary flex w-max gap-2.5 px-6 py-2 justify-center items-center text-base font-bold">
						Explore
					</a>
				</div>
			</div>
		</section>

		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

		<script src="{{asset('scripts/sliderConfig.js')}}" type="module"></script>
	</body>

</html>