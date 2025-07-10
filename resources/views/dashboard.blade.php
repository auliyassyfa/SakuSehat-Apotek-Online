<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5 mb-4 text-gray-900 text-2xl">
                    Selamat Datang <span class="text-2xl font-bold text-rose-500">{{Auth::user()->name}}</span>!
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-xl flex flex-col items-center m-5 p-10">
                <img src="{{asset('assets/images/user.png')}}" alt="profile" class="w-32 h-32">
                <h1 class="mt-5 font-bold text-2xl text-blue-900">{{Auth::user()->name}}</h1>
                <p class="text-blue-500 text-md">{{Auth::user()->email}}</p>
                <a href="{{route('profile.edit')}}" class="mt-5 bg-rose-200 p-2 rounded-xl font-bold text-blue-900 text-md">Edit Profile</a>
            </div>
        </div>
    </div>
</x-app-layout>
