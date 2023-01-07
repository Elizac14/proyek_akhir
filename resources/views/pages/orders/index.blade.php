@extends('layouts.app')

@section('content')
    
    <div class="container px-5">
      <a class="btn btn-primary ms-auto" href="{{route('orders.create')}}">Create</a>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                 <th scope="col">Kode</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah Pesanan</th>
                <th scope="col">Jenis Layanan</th>
                 <th scope="col">Total Harga</th>
                <th scope="col">Tanggal Order</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $item)
                
             
              <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->code }}</td>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->total_weight }}</td>
                <td>{{ $item->layanan->name }}</td>
                 <td>Rp. {{ $item->price }}</td>
                <td>{{ $item->date_in }} - {{ $item->date_out }}</td>
                <td>
                  @if ( $item->status == '1')
                    On Progress
                  @elseif( $item->status == '2')
                    Done
                  @else
                    Picked
                  @endif
                </td>
               
                <td class="d-flex">
                 <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                      action="{{ route('orders.destroy', $item->id) }}" method="POST">
                      <a href="{{ route('orders.edit', $item->id) }}"
                          class="btn btn-warning text-white me-2">UBAH</a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger text-white">HAPUS</button>
                  </form>
                </td>
              </tr>
               @endforeach
             
            </tbody>
      </table>
    </div>
@endsection
