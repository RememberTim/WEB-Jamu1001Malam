@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>TAMBAH DATA</strong>

        </div>   
        <div class="card-body card-block">
            <form action="{{ route('product.store')}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama" class="form-control-label"> nama Jamu </label>
            <input type="text"
                name="nama"
                value= "{{ old('nama')}}"
                class="form-control @error('nama') is-invalid @enderror"/>
            @error('nama')<div class ="text-muted">{{ $message }}</div>   @enderror  
        </div>

        <div class="form-group">
            <label for="grid-last-name" class="form-control-label" >
                Image
            </label><br>
            <input name="picturePath" class="form-control @error('name') is-invalid @enderror" id="grid-last-name" type="file" placeholder="Food Image">
        </div>
    
        <div class="form-group">
        <label for="tipe" class=" form-control-label">tipe Jamu</label>
            <select name="tipe" class="form-control">
                <option value="Anak-anak & Dewasa">Anak-anak & Dewasa</option>     
                <option value="Anak-anak">Anak-anak</option>
                <option value="Dewasa">Dewasa</option>                                   
        </select>       
        </div>
       
        <div class="form-group">
            <label for="deskripsi" class="form-control-label"> Deskripsi </label>
            <textarea name="deskripsi" 
            class="form-control  @error('deskripsi') is-invalid @enderror">{{old('deskripsi')}}</textarea>
            @error('deskripsi')<div class ="text-muted">{{ $message }}</div>   @enderror 
        </div>

         <div class="form-group">
            <label for="bahan" class="form-control-label"> Bahan </label>
            <textarea name="bahan" 
            class="form-control  @error('bahan') is-invalid @enderror">{{old('bahan')}}</textarea>
            @error('bahan')<div class ="text-muted">{{ $message }}</div>   @enderror 
        </div>

        <div class="form-group">
            <label for="harga" class="form-control-label"> Harga </label>
            <input type="number"
                name="harga"
                value= "{{ old('harga')}}"
                class="form-control @error('harga') is-invalid @enderror"/>
                @error('harga')<div class ="text-muted">{{ $message }}</div>   @enderror 
        </div>
        <div class="form-group">
            <label for="keuntungan" class="form-control-label"> keuntungan </label>
            <input type="number"
                name="keuntungan"
                value= "{{ old('keuntungan')}}"
                class="form-control @error('keuntungan') is-invalid @enderror"/>
                @error('keuntungan')<div class ="text-muted">{{ $message }}</div>   @enderror 
        </div>

        <div class="form-group">
            <label for="stok" class="form-control-label"> Stok</label>
            <input type="number"
                name="stok"
                value= "{{ old('stok')}}"
                class="form-control @error('stok') is-invalid @enderror"/>
                @error('stok')<div class ="text-muted">{{ $message }}</div>   @enderror 
        </div>
        <div class="form-group">
            <label for="rating" class="form-control-label"> Rating</label>
            <input type="double"
                name="rating"
                value= "{{ old('rating')}}"
                class="form-control @error('rating') is-invalid @enderror"/>
                @error('rating')<div class ="text-muted">{{ $message }}</div>   @enderror 
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">
                Tambah Barang
            </button>
        </div>
            </form>
        </div>     
    </div> 

@endsection


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Food &raquo; Create') !!}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                    </div>
                @endif
                <form class="w-full" action="{{ route('food.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Name
                            </label>
                            <input value="{{ old('name') }}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Food Name">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Image
                            </label>
                            <input name="picturePath" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="file" placeholder="Food Image">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Description
                            </label>
                            <input value="{{ old('description') }}" name="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Food Description">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Ingredients
                            </label>
                            <input value="{{ old('ingredients') }}" name="ingredients" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Food Ingredients">
                            <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, contoh : bawang merah, paprika, bawang bombay, timun</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Price
                            </label>
                            <input value="{{ old('price') }}" name="price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="number" placeholder="Food Price">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Rate
                            </label>
                            <input value="{{ old('rate') }}" name="rate" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="number" max="5" step="0.01" placeholder="Food Rate">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Types
                            </label>
                            <input value="{{ old('types') }}" name="types" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Food Types">
                            <p class="text-gray-600 text-xs italic">Dipisahkan dengan koma, contoh : recommended,popular,new_food</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Save Food
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> --}}