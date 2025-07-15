<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="bg-indigo-700 text-white rounded-full py-2 px-3">
                Tambah Produk
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm rounded-lg">
                @forelse($products as $product)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3 w-[50%]">
                        <img src="{{Storage::url($product->photo)}}" alt="" class="w-[40px] h-[40px]">
                        <div>
                            <h3 class="font-bold">
                                {{$product->name}}
                            </h3>
                            <p class="text-base text-slate-500"> 
                                Rp {{$product->price}}
                            </p>
                        </div>
                    </div>
                    <p class=" w-[20%]text-base text-slate-500"> 
                        {{$product->category->name}}
                    </p>
            
                    <!-- button edit kategori -->
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.products.edit', $product) }}" class="py-2 px-5 rounded-full text-white bg-indigo-700">
                            Edit
                        </a>
                         <!-- button delete kategori -->
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button class="font-bold py-2 px-5 rounded-full text-white bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div>
                    Produk Tidak Ditemukan.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>