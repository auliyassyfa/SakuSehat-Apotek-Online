<!-- file ini untuk menampilkan data kategori -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="bg-indigo-700 text-white rounded-full py-2 px-3">
                Tambah Kategori
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm rounded-lg">
                @forelse($categories as $category)
                <div class="item-card flex flex-row justify-between">
                    <img src="{{Storage::url($category->icon)}}" alt="" class="w-[40px] h-[40px]">
                    <h3 class="font-bold">
                        {{$category->name}}
                    </h3>
                    <!-- button edit kategori -->
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{route('admin.categories.edit', $category) }}" class="py-2 px-5 rounded-full text-white bg-indigo-700">
                            Edit
                        </a>
                         <!-- button delete kategori -->
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
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
                    Kategori Tidak Ditemukan.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>