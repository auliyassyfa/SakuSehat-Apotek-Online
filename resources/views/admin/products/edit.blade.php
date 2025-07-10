<!-- untuk mengedit data produk -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm p-10 sm:rounded-lg">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="my-2">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$product->name}}" 
                        required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- price -->
                     <div class="my-2">
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{$product->price}}" 
                        required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <!-- categories id --> 
                    <div class="my-2">
                        <x-input-label for="category_id" :value="__('category')" />

                        <select name="category_id" id="category_id" class=" mt-1 py-2 rounded-lg pl-3 w-full border border-slate-300">
                            <!-- menampilkan kategori produk sebelumnya -->
                            <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                            @forelse($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                            @endforelse
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <!-- desc -->
                    <div class="my-2">
                        <x-input-label for="about" :value="__('about')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="mt-1 border border-slate-300 rounded-lg w-full">{{$product->about}}
                        </textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <!-- photo -->
                    <div class="my-2">
                        <x-input-label for="photo" :value="__('photo')" />
                        <img src="{{Storage::url($product->photo)}}" alt="" class="w-[40px] h-[40px]">
                        <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-4">
                            {{ __('Perbarui Produk') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>