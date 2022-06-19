<table class="table tablebordered">
    {{-- @foreach ($item->users as $user) --}}
    <tr>
        <th>Nama</th>
        <td>{{$item->user->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{  $item->user->email }}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{ $item->user->telepon }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{$item->user->alamat }}</td>
    </tr>
    {{-- @endforeach --}}
    <tr>
        <th>Total Transaksi</th>
        <td>{{number_format($item->total) }}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{  $item->status }}</td>
    </tr>
    <tr>
        <th>Bayar Menggunakan</th>
       <td>{{ $item->payment_url }}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="tabble table-bordered w-100">
                <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Harga</th>        
                </tr>
               
                <tr>
                    <td>{{  $item->product->nama}}</td>
                    <td>{{  $item->product->tipe}}</td>
                    <td>{{  $item->product->harga}}</td>
                </tr>
               
            </table>

        </td>
    </tr>
</table>
<div class="col-12">
    @if($item->status == 'ORDER')
    <a href="{{ route('transactions.status', $item->id) }}?status=DELIVERED" class="btn btn-secondary btn-block">
                <i class="fa fa-check"></i> SET DELIVERED
            </a>
            @endif
</div>
   
    {{-- <div class="col-4">
    <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
    <i class="fa fa-times"></i> Set Failed
     </a>
    </div>
    <div class="col-4">
    <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-warning btn-block">
     <i class="fa fa-spinner"></i> Set Pending
     </a>
    </div> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction &raquo; {{ $item->food->name }} by {{ $item->user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full rounded overflow-hidden shadow-lg px-6 py-6 bg-white">
                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                    <div class="w-full md:w-1/6 px-4 mb-4 md:mb-0">
                        <img src="{{ $item->food->picturePath }}" alt="" class="w-full rounded">
                    </div>
                    <div class="w-full md:w-5/6 px-4 mb-4 md:mb-0">
                        <div class="flex flex-wrap mb-3">
                            <div class="w-2/6">
                                <div class="text-sm">Product Name</div>
                                <div class="text-xl font-bold">{{ $item->food->name }}</div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm">Quantity</div>
                                <div class="text-xl font-bold">{{ number_format($item->quantity) }}</div>
                            </div>
                            <div class="w-2/6">
                                <div class="text-sm">Total</div>
                                <div class="text-xl font-bold">{{ number_format($item->total) }}</div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm">Status</div>
                                <div class="text-xl font-bold">{{ $item->status }}</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                            <div class="w-2/6">
                                <div class="text-sm">User Name</div>
                                <div class="text-xl font-bold">{{ $item->user->name }}</div>
                            </div>
                            <div class="w-3/6">
                                <div class="text-sm">Email</div>
                                <div class="text-xl font-bold">{{ $item->user->email }}</div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm">City</div>
                                <div class="text-xl font-bold">{{ $item->user->city }}</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                            <div class="w-4/6">
                                <div class="text-sm">Address</div>
                                <div class="text-xl font-bold">{{ $item->user->address }}</div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm">Number</div>
                                <div class="text-xl font-bold">{{ $item->user->houseNumber }}</div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm">Phone</div>
                                <div class="text-xl font-bold">{{ $item->user->phoneNumber }}</div>
                            </div>
                        </div>
                        <div class="flex flex-wrap mb-3">
                            <div class="w-5/6">
                                <div class="text-sm">Payment URL</div>
                                <div class="text-lg">
                                    <a href="{{ $item->payment_url }}">{{ $item->payment_url }}</a>
                                </div>
                            </div>
                            <div class="w-1/6">
                                <div class="text-sm mb-1">Change Status</div>
                                <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'ON_DELIVERY']) }}"
                                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                    On Delivery
                                </a>
                                <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'DELIVERED']) }}"
                                   class="bg-green-500 hover:bg-green-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                    Delivered
                                </a>
                                <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'CANCELLED']) }}"
                                   class="bg-red-500 hover:bg-red-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                                    Cancelled
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}