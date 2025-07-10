<!-- menampilkan data transaksi -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center px-4 ">
            <h2 class="font-semibold text-xl text-blue-900 leading-tight">
                {{ Auth::user()->hasRole('owner') ? __('Apotek Orders') : __('Transaksi Saya') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-white flex flex-col gap-y-5 p-6 shadow-md rounded-2xl">

                @forelse($product_transactions as $transaction)

                    @hasrole('buyer')
                    <!-- Tampilan untuk buyer -->
                    <div class="flex flex-row justify-between items-center gap-4 border border-blue-900 p-4 rounded-xl shadow-sm">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Total Transaksi</p>
                            <h3 class="text-lg font-bold text-blue-900">Rp {{ $transaction->total_amount }}</h3>
                        </div>

                        <div class="hidden md:block">
                            <p class="text-sm text-gray-500 mb-1">Tanggal</p>
                            <h3 class="text-base font-semibold text-blue-900">{{ $transaction->created_at }}</h3>
                        </div>

                        <div>
                            @if($transaction->is_paid)
                                <span class="inline-block bg-green-500 text-white text-xs font-semibold py-1 px-3 rounded-full shadow-sm">
                                    Sukses
                                </span>
                            @else
                                <span class="inline-block bg-red-600 text-white text-xs font-semibold py-1 px-3 rounded-full shadow-sm">
                                    Pending
                                </span>
                            @endif
                        </div>

                        <div>
                            <a href="{{ route('product_transactions.show', $transaction) }}"
                               class="inline-block bg-blue-900 text-white text-sm font-semibold px-3 py-2 rounded-full hover:bg-blue-800 transition">
                                Lihat Details
                            </a>
                        </div>
                    </div>

                    @else
                    <!-- Tampilan untuk admin (owner) tetap seperti semula) -->
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <div>
                                <p class="text-base text-slate-500">
                                    Total Transaksi
                                </p>
                                <h3 class="font-bold">
                                    Rp {{ $transaction->total_amount }}
                                </h3>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-base text-slate-500">
                                Tanggal
                            </p>
                            <h3 class="font-bold">
                                {{ $transaction->created_at }}
                            </h3>
                        </div>
                        @if($transaction->is_paid)
                            <span class="py-1 px-3 rounded-full bg-green-600">
                                <p class="text-white text-sm">
                                    Sukses
                                </p>
                            </span>
                        @else
                            <span class="py-1 px-3 rounded-full bg-red-700">
                                <p class="text-white text-sm">
                                    Pending
                                </p>
                            </span>
                        @endif
                        <div class="flex flex-row items-center gap-x-2">
                            <a href="{{ route('product_transactions.show', $transaction) }}" class="py-2 px-5 rounded-full text-white bg-indigo-700">
                                Lihat Details
                            </a>
                        </div>
                    </div>
                    @endhasrole

                    <hr class="my-3">

                @empty
                    <p class="text-center text-gray-500">Belum tersedia transaksi</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
