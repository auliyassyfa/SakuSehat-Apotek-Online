<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{asset('assets/images/saku.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-slate-50">

    <div class="flex flex-col items-center px-6 py-20 ">
      <img src="{{asset('assets/images/logosakusehat.png')}}" class="mb-[50px] w-[180px]" alt="">
      @if($errors->any())
          <div class="mb-4 text-red-600 bg-red-100 p-3 rounded">
              <ul class="list-disc ml-4">
                  @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
      <form action="{{route('login')}}" method="POST" class="mx-auto max-w-[345px] w-full p-6 bg-rose-200 rounded-3xl mt-auto" id="deliveryForm">
        @csrf
        <div class="flex flex-col gap-5">
          <p class="text-[22px] font-bold">
            Login
          </p>
          <!-- Email Address -->
          <div class="flex flex-col gap-2.5">
            <label for="email" class="text-base font-semibold">Alamat Email</label>
            <input 
                style="background-image: url('{{asset('assets/svgs/ic-email.svg')}}')"
                type="email" 
                name="email" 
                id="email__" 
                class="form-input" placeholder="masukkan email">
          </div>
          <!-- Password -->
          <div class="flex flex-col gap-2.5">
            <label for="password" class="text-base font-semibold">Password</label>
            <input 
                style="background-image: url('{{asset('assets/svgs/ic-lock.svg')}}')"
                type="password" 
                name="password" id="password__"
                class="form-input" 
                placeholder="masukkan password">
          </div>
          <button type="submit" class="inline-flex text-white font-bold text-base bg-blue-900 rounded-full whitespace-nowrap px-[30px] py-3 justify-center items-center" >
            Login
          </button>
        </div>
        <div class="flex items-center justify-center ">
          <a href="{{route('register')}}" class="flex item-center font-semibold text-red-500 text-sm mt-[30px] underline">
          Belum punya akun? register disini!
          </a>
        </div>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </body>

</html>