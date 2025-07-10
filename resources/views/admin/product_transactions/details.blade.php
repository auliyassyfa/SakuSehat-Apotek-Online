<!--menampilkan data transaksi  -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{('Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white flex flex-col gap-y-5 overflow-hidden p-10 shadow-sm rounded-lg">
                <div class="item-card flex flex-col gap-y-3 md:flex-row justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <div>
                            <p class="text-base text-slate-500"> 
                                Total Transaksi
                            </p>
                            <h3 class="font-bold">
                                Rp {{$productTransaction->total_amount}}
                            </h3>
                        </div>
                    </div>
                    <div>
                        <p class="text-base text-slate-500"> 
                            Tanggal
                        </p>
                        <h3 class="font-bold">
                            {{$productTransaction->created_at}}
                        </h3>
                    </div>
                        @if($productTransaction->is_paid)
                            <span class="py-1 px-3 w-fit rounded-full bg-green-600">
                                <p class="text-white text-sm">
                                    Sukses
                                </p>
                            </span>
                        @else
                            <span class="py-1 px-3 w-fit rounded-full bg-red-700">
                                <p class="text-white text-sm">
                                    Pending
                                </p>
                            </span>
                        @endif
    
                </div>
                <hr class="my-3">

                <h3 class="font-bold">
                    Daftar Produk
                </h3>
                
                <div class="grid-cols-1 md:grid-cols-4 grid gap-x-10">
                    <div class="flex flex-col gap-y-5 col-span-2">

                        @forelse($productTransaction->transactionDetails as $detail)
                        <div class="item-card flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="{{Storage:: url($detail->product->photo)}}" alt="" class="w-[40px] h-[40px]">
                                <div>
                                    <h3 class="font-bold">
                                        {{$detail->product->name}}
                                    </h3>
                                    <p class="text-base text-slate-500"> 
                                        Rp {{$detail->product->price}}
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500"> 
                                {{$detail->product->category->name}}
                            </p>
                        </div>
                        @empty
                        @endforelse

                        <h3 class="font-bold">
                            Detail Pembayaran
                        </h3>
                        <div class="item-card flex flex-row justify-between items-center">
                            <p class="text-base text-slate-500"> 
                                Alamat
                            </p>
                            <h3 class="tetx-xl font-bold text-indigo-950">
                                {{$productTransaction->address}}
                            </h3>
                        </div>

                        <div class="item-card flex flex-row justify-between items-center">
                            <p class="text-base text-slate-500"> 
                                Kota
                            </p>
                            <h3 class="tetx-xl font-bold text-indigo-950">
                                {{$productTransaction->city}}
                            </h3>
                        </div>

                        <div class="item-card flex flex-row justify-between items-center">
                            <p class="text-base text-slate-500"> 
                                Nomor Telepon
                            </p>
                            <h3 class="tetx-xl font-bold text-indigo-950">
                                {{$productTransaction->phone_number}}
                            </h3>
                        </div>
                                                
                        <div class="item-card flex flex-row justify-between items-center">
                            <p class="text-base text-slate-500"> 
                                Kode Pos
                            </p>
                            <h3 class="tetx-xl font-bold text-indigo-950">
                                {{$productTransaction->post_code}}
                            </h3>
                        </div>
                                                
                        <div class="item-card flex flex-col items-start">
                            <p class="text-base text-slate-500"> 
                                Catatan
                            </p>
                            <h3 class="tetx-lg font-bold text-indigo-950">
                                {{$productTransaction->notes}}
                            </h3>
                        </div>

                    </div>
                    <div class="flex flex-col gap-y-5 col-span-1 md:items-end mt-4">
                        <h3 class="tetx-xl font-bold text-indigo-950">
                            Bukti Pembayaran:
                        </h3>
                        <img src="{{Storage::url($productTransaction->proof)}}" alt="{{Storage::url($productTransaction->proof)}}" class="w-[300px] h-[300px]">
                    </div>
                </div>
                <hr class="my-3">

                <!-- button konfirmasi -->
                <form method="POST" action="{{ route('product_transactions.update', $productTransaction) }}">
                    @csrf
                    @method('PUT')
                    <button class="font-bold py-2 px-5 rounded-full text-white bg-indigo-700">
                        Konfirmasi Pembelian
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>