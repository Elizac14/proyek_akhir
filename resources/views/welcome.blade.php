@extends('layouts.app')

@section('content')
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        body{
            font-family: Poppins;
        }
    </style>
    <div id="app">
        <div class="my-4 mt-5 container">
            <div class="col-12">
                    <h5 class="text-center" style="font-size: 48px; font-weight:600; color: #7000FD">HOME MADE TASTE</h5>
                    <div class="bg-white shadow-sm w-50 px-4 mx-auto py-2 rounded-3 mt-2">
                        <form method="GET" class=" d-flex justify-content-between" action="{{ route('cek') }}" style="gap: .25rem;">
                            <input type="text" name="code" placeholder="Masukkan kode disini" class="w-100" style="border:none">
                            <button class="btn btn-primary px-4 py-2">Cari</button>
                        </form>
                    </div>
                    <div class="w-50 mx-auto px-4 py-2 mt-3 rounded-pill bg-white shadow-sm">
                        @if ($order)
                        @if ($order->status=== "1")
                            Order anda dalam proses
                        @elseif ($order->status=== "2")
                            Order anda sudah selesai 
                        @else
                            Barang anda sudah diambil
                        @endif
                        @else
                            order tidak ditemukan
                        @endif
                   </div>
            </div>       
        </div>
    </div>

@endsection
