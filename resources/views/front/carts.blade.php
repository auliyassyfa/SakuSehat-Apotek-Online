<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link rel="shortcut icon" href="{{asset('assets/images/saku.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-slate-50">
    <!-- Topbar -->
    <section class="relative flex items-center justify-between w-full gap-5 wrapper">
      <a href="{{route('front.index')}}" class="p-2 bg-rose-100 rounded-full">
        <img src="{{asset('assets/svgs/ic-arrow-left.svg')}}" class="size-5" alt="">
      </a>
      <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
        Shopping Carts
      </p>
    </section>

    <!-- Items -->
    <section class="wrapper flex flex-col gap-2.5">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">
          Items
        </p>
        <button type="button" class="p-2 bg-white rounded-full" data-expand="itemsList">
          <img src="{{asset('assets/svgs/ic-chevron.svg')}}" class="transition-all duration-300 -rotate-180 size-5" alt="">
        </button>
      </div>
      <div class="flex flex-col gap-4" id="itemsList">

        @forelse($my_carts as $cart)
        <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
          <img src="{{Storage::url ($cart->product->photo)}}" class="w-full max-w-[70px] max-h-[70px] object-contain"
            alt="">
          <div class="flex flex-wrap items-center justify-between w-full gap-1">
            <div class="flex flex-col gap-1">
              <h3>
                {{$cart->product->name}}
              </h3>
              <p class="text-sm text-grey product-price" data-price="{{$cart->product->price}}">
                Rp {{$cart->product->price}}
              </p>
            </div>
            <form action="{{route('carts.destroy', $cart)}}" method="POST"> 
              @csrf
              @method('DELETE')
                <button type="submit">
                  <img src="{{asset('assets/svgs/ic-trash-can-filled.svg')}}" class="size-[30px]" alt="">
                </button>
            </form>
          </div>
        </div>
        @empty
        <p>
          belum ada transaksi tersedia.
        </p>
        @endforelse

      </div>
    </section>

    <!-- Details Payment -->
    <section class="wrapper flex flex-col gap-2.5">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">
          Detail Pembayaran
        </p>
        <button type="button" class="p-2 bg-white rounded-full" data-expand="__detailsPayment">
          <img src="{{asset('assets/svgs/ic-chevron.svg')}}" class="transition-all duration-300 size-5" alt="">
        </button>
      </div>
      <div class="p-6 bg-white rounded-3xl" id="__detailsPayment" style="display: none;">
        <ul class="flex flex-col gap-5">
          <li class="flex items-center justify-between">
            <p class="text-base font-semibold first:font-normal">
              Sub Total
            </p>
            <p class=" text-base font-semibold first:font-normal"  id="checkout-sub-total">
              
            </p>
          </li>
          
          <li class="flex items-center justify-between">
            <p class="text-base font-semibold first:font-normal" >
              Ongkos Kirim
            </p>
            <p class="text-base font-semibold first:font-normal" id="checkout-delivery-fee">
              
            </p>
          </li>

          <li class="flex items-center justify-between">
            <p class="text-base font-bold first:font-normal">
              Grand Total
            </p>
            <p class="text-base font-bold first:font-normal text-primary" id="checkout-grand-total">
            </p>
          </li>
        </ul>
      </div>
    </section>

    <!-- Payment Method -->
    <section class="wrapper flex flex-col gap-2.5">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">
          Metode Pembayaran
        </p>
      </div>
      <div class="grid items-center grid-cols-2 gap-4">
        <label
          class="relative rounded-2xl bg-white active:bg-blue-50 border border-grey-900  flex gap-2.5 px-3.5 py-3 items-center justify-start">
          <input type="radio" name="payment_method" id="manualMethod" class="absolute opacity-0">
          <img src="{{asset('assets/svgs/ic-receipt-text-filled.svg')}}" alt="">
          <p class="text-base font-semibold">
            Manual
          </p>
        </label>
      </div>
      <div class="p-4 mt-0.5 bg-white rounded-3xl hidden" id="manualPaymentDetail">
        <div class="flex flex-col gap-5">
          <p class="text-base font-bold">
            Transfer Pembayaran
          </p>
          <div class="inline-flex items-center gap-2.5">
            <img src="{{asset('assets/svgs/ic-bank.svg')}}" class="size-5" alt="">
            <p class="text-base font-semibold">
              Bank BCA
            </p>
          </div>
          <div class="inline-flex items-center gap-2.5">
            <p class="text-base font-semibold">
              68123456
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Delivery to -->
    <section class="wrapper flex flex-col gap-2.5 pb-20">
      <div class="flex items-center justify-between">
        <p class="text-base font-bold">Alamat Pengiriman</p>
        <button type="button" class="p-2 bg-white rounded-full" data-expand="deliveryForm">
          <img src="{{ asset('assets/svgs/ic-chevron.svg') }}" class="transition-all duration-300 -rotate-180 size-5" alt="">
        </button>
      </div>

      <form enctype="multipart/form-data" action="{{ route('product_transactions.store') }}" method="POST" class="p-6 bg-white rounded-3xl" id="deliveryForm">
        @csrf

        @if($errors->any())
          <div class="mb-4 text-red-600 bg-red-100 p-3 rounded">
              <ul class="list-disc ml-4">
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <div class="flex flex-col gap-5">
          <!-- Address -->
          <div class="flex flex-col gap-2.5">
            <label for="address" class="text-base font-semibold">Alamat</label>
            <input type="text" name="address" id="address__" class="border border-slate-300 form-input bg-[url('{{ asset('assets/svgs/ic-location.svg') }}')]" value="">
          </div>

          <!-- City -->
          <div class="flex flex-col gap-2.5">
            <label for="city" class="text-base font-semibold">Kota</label>
            <input type="text" name="city" id="city__" class="border border-slate-300 form-input bg-[url('{{ asset('assets/svgs/ic-map.svg') }}')]" value="">
          </div>

          <!-- Post Code -->
          <div class="flex flex-col gap-2.5">
            <label for="post_code" class="text-base font-semibold">Kode Pos</label>
            <input type="number" name="post_code" id="postcode__" class="border border-slate-300 form-input bg-[url('{{ asset('assets/svgs/ic-house.svg') }}')]" value="">
          </div>

          <!-- Phone Number -->
          <div class="flex flex-col gap-2.5">
            <label for="phone_number" class="text-base font-semibold">Nomor Telephone</label>
            <input type="text" name="phone_number" id="phonenumber__" class="border border-slate-300 form-input bg-[url('{{ asset('assets/svgs/ic-phone.svg') }}')]" value="">
          </div>

          <!-- Add Notes -->
          <div class="flex flex-col gap-2.5">
            <label for="notes" class="text-base font-semibold">Catatan</label>
            <span class="relative">
              <img src="{{ asset('assets/svgs/ic-edit.svg') }}" class="absolute size-5 top-4 left-4" alt="">
              <textarea name="notes" id="notes__" class="border border-slate-300 form-input !rounded-2xl w-full min-h-[150px] pl-10 pt-4"></textarea>
            </span>
          </div>

          <!-- Proof of Payment -->
          <div class="flex flex-col gap-2.5">
            <label for="proof" class="text-base font-semibold">Bukti Pembayaran</label>
            <input type="file" name="proof" id="proof_of_payment__" class="border border-slate-300 form-input bg-[url('{{ asset('assets/svgs/ic-folder-add.svg') }}')]">
          </div>

          <!-- Total and Submit -->
          <div class="flex flex-col gap-2 pt-4 border-t border-gray-200">
            <p class="text-sm text-rose-500 font-medium">Grand Total</p>
            <p class="text-xl font-bold text-blue-900" id="checkout-grand-total-price">Rp 1000</p>

            <button type="submit" class="mt-4 inline-flex items-center justify-center px-5 py-3 text-base font-bold text-white bg-blue-900 rounded-xl hover:bg-blue-800 transition">
              Submit
            </button>
          </div>
        </div>
      </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{asset('scripts/global.js')}}"></script>
    <script>
      // fungsi kalkulasi harga
      function calculatePrice(){
        let subTotal = 0;
        let deliveryFee = 10000;

        document.querySelectorAll('.product-price').forEach(item => {
            subTotal += parseFloat(item.getAttribute('data-price'));
        });

        document.getElementById('checkout-delivery-fee').textContent = 'Rp ' + deliveryFee.toLocaleString('id', 
        {minimumFractionDigits: 2, maximumFractionDigits: 2});

        document.getElementById('checkout-sub-total').textContent = 'Rp ' + subTotal.toLocaleString('id', 
        {minimumFractionDigits: 2, maximumFractionDigits: 2});

        const grandTotal = subTotal + deliveryFee;
        document.getElementById('checkout-grand-total').textContent = 'Rp ' + grandTotal.toLocaleString('id', 
        {minimumFractionDigits: 2, maximumFractionDigits: 2});

        document.getElementById('checkout-grand-total-price').textContent = 'Rp ' + grandTotal.toLocaleString('id', 
        {minimumFractionDigits: 0, maximumFractionDigits: 2});
    }

    document.addEventListener('DOMContentLoaded', function(){
        calculatePrice();
    });

    </script>
  </body>

</html>