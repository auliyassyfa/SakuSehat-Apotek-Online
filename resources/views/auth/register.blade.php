<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Parma</title>
    <link rel="shortcut icon" href="{{asset('assets/images/saku.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

  </head>

  <body class="bg-slate-50">

    <div class="flex flex-col items-center px-6 py-10 min-h-dvh">
      <img src="{{asset('assets/images/logosakusehat.png')}}" class="mb-[53px]" alt="">
      <form action="{{route('register')}}" method="POST" class="mx-auto max-w-[345px] w-full p-6 bg-rose-200 rounded-3xl mt-auto" id="deliveryForm">
        @csrf
        <div class="flex flex-col gap-5">
          <p class="text-[22px] font-bold">
            Buat Akun Baru
          </p>
          <!-- Full Name -->
          <div class="flex flex-col gap-2.5">
            <label for="fullname" class="text-base font-semibold">Nama Lengkap</label>
            <input 
                style="background-image: url('{{asset('assets/svgs/ic-profile.svg')}}')"
                type="text" 
                name="name" 
                id="fullname__"
                class="form-input" 
                placeholder="masukkan nama lengkap"
                required autofocus autocomplete="name">
          </div>
          <!-- Email Address -->
          <div class="flex flex-col gap-2.5">
            <label for="email" class="text-base font-semibold"> Alamat Email</label>
            <input 
                style="background-image: url('{{asset('assets/svgs/ic-email.svg')}}')"
                type="email" 
                name="email" 
                id="email__"
                class="form-input" 
                placeholder="masukkan email"
                required autocomplete="username">
          </div>
          <!-- Password -->
          <div class="flex flex-col gap-2.5">
            <label for="password" class="text-base font-semibold">Password</label>
            <input 
                style="background-image: url('{{asset('assets/svgs/ic-lock.svg')}}')"
                type="password" 
                name="password" 
                id="password__"
                class="form-input" 
                placeholder="masukkan password"
                required autocomplete="new-password">
          </div>
          <!-- Confirm Password -->
          <div class="flex flex-col gap-2.5">
            <label for="password" class="text-base font-semibold">Konfirmasi Password</label>
            <input 
                style="background-image: url('{{asset('assets/svgs/ic-lock.svg')}}')"
                type="password" 
                name="password_confirmation" 
                id="confirm-password__"
                class="form-input" 
                placeholder="konfirmasi password">
          </div>
          <button type="submit" class="inline-flex text-white font-bold text-base bg-blue-900 rounded-full whitespace-nowrap px-[30px] py-3 justify-center items-center">
            Buat Akun
          </button>
        </div>
        <div class="flex items-center justify-center">
          <a href="{{route ('login')}}" class="font-semibold text-red-500 text-sm mt-[15px] underline">
            Sudah punya akun? Login disini!
          </a>
        </div>
      </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  </body>

</html>