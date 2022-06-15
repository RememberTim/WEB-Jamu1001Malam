@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h4 class="box-title">DAFTAR TRANSAKSI</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No.Telp</th>
                                        <th>Kuantitas</th> 
                                        <th>Total</th>                                                      
                                        <th>Transaksi Status</th>
                                       
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            <tbody>
                              @forelse ($transaction as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->email}}</td>
                                    <td>{{ $item->user->telepon }}</td>
                                    <td>{{ $item->quantity  }}</td>   
                                    <td>{{ $item->total }}</td>        
                                    <td> {{ $item->status }}</td>            
                                    {{-- <td>
                                      @if ($item->transaction_status == 'MASUK')
                                        <span class="badge badge-info">
                                        @elseif ($item->transaction_status == 'TERIMA')
                                        <span class="badge badge-warning">
                                        @elseif ($item->transaction_status == 'SELESAI')
                                        <span class="badge badge-success">
                                        @elseif ($item->transaction_status == 'BATAL')
                                        <span class="badge badge-danger">
                                        @else
                                        <span>
                                        @endif
                                            {{ $item->transaction_status }}
                                        </span>
                                    </td> --}}
                                 
                                    <td>
                                    {{-- @if($item->transaction_status == 'MASUK')
                                <a href="{{ route('transactions.status', $item->id) }}?status=TERIMA" class="btn btn-success btn-sm">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        @endif --}}
                                    <a href="#mymodal"
                                        data-remote="{{ route('transactions.show', $item->id) }}"
                                        data-toggle="modal"
                                        data-target="#mymodal"
                                        data-title="Detail Transaksi {{ $item->id  }}"
                                        class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                  
                                    <form action="{{ route('transactions.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse

                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">ID</th>
                        <th class="border px-6 py-4">Food</th>
                        <th class="border px-6 py-4">User</th>
                        <th class="border px-6 py-4">Quantity</th>
                        <th class="border px-6 py-4">Total</th>
                        <th class="border px-6 py-4">Status</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($transaction as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->id }}</td>
                                <td class="border px-6 py-4 ">{{ $item->food->name }}</td>
                                <td class="border px-6 py-4 ">{{ $item->user->name }}</td>
                                <td class="border px-6 py-4">{{ $item->quantity }}</td>
                                <td class="border px-6 py-4">{{ number_format($item->total) }}</td>
                                <td class="border px-6 py-4">{{ $item->status }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('transactions.show', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        View
                                    </a>
                                    <form action="{{ route('transactions.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="6" class="border text-center p-5">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $transaction->links() }}
            </div>
        </div>
    </div>
</x-app-layout> --}}