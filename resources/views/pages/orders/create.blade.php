@extends('layouts.app')

@section('content')
<div class="container px-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm rounded border-0">
                <h5 class="p-3 text-center" style="border-bottom: 1px solid #8888; background: #7000FD; color: white;">Form Order</h5>
                <div class="p-3">
                    <form method="post" action="{{ route('orders.store') }}" >
                        @csrf
                        <section class="d-flex flex-column">
                            <label class="mb-2" for="user_name">Nama Customer</label>
                            <input class="w-100" type="text" placeholder="Masukkan nama pelanggan" name="user_name" required >
                        </section>
                        <section class="d-flex flex-column mt-2">
                            <label class="mb-2" for="total_weight">Jumlah pesanan</label>
                            <input class="w-100" type="number" placeholder="Masukkan Total barang" name="total_weight" id="total_weight" required>
                        </section>
                        <section class="d-flex flex-column mt-2">
                            <label for="layanan_id">Pilih Layanan</label>
                            <select  class="form-select" aria-label="Default select example" name="layanan_id" id="layanan_id" required>
                                <option value="" selected>Pilih Layanan</option>
                               @foreach ($layanan as $item )
                                   <option value="{{$item->id}}" data-name="{{ $item->id }}" data-price="{{ $item->price }}">{{ $item->name }}</option>
                               @endforeach
                            </select>
                        </section>
                     
                        <section class="d-flex flex-column mt-2">
                            <label class="mb-2" for="date_in">Tanggal Order</label>
                            <input class="w-100" type="date" name="date_in" required>
                        </section>
                        <section class="d-flex flex-column mt-2">
                            <label class="mb-2" for="date_out">Tanggal Barang Akan Dikirim</label>
                            <input class="w-100" type="date" name="date_out" required>
                        </section>
 
                        <section class="d-flex flex-column mt-2">
                            <label class="mb-2" for="price">Total keseluruhan</label>
                            <input class="w-100" type="number" id="price" placeholder="terisi otomatis" name="price" required>
                        </section>
                        <button class="border-none w-100 text-center text-white mt-4 py-2 rounded-lg border-0" style="background: #7000FD">Buat Pesanan</button>
                    <form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


 var price=0;
$('#layanan_id').change(function() {
    var opt = $(this.options[this.selectedIndex]);
    price = opt.attr('data-price');
    var pesanan = $('#total_weight').val();
    var total_price = pesanan*price; 
    $('#price').val(total_price)
});

$('#total_weight').change(function() {
    console.log(price)
    var pesanan = $('#total_weight').val();
    var total_price = pesanan*price; 
    $('#price').val(total_price)
});

</script>
@endsection
