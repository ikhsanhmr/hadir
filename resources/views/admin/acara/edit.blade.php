@extends('admin.layout.layout')
@section('content')


<div  x-data="{ mediaIsOnline: '{{$acara->media != 'offline' ? true : false}}'}" class="max-w-2xl mx-auto my-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">


    <h1 class=" text-xl mb-7">Edit Acara</h1>
    <form action="{{route('acara.update', $acara->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-4">
            <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
            <input type="text" id="judul" value="{{$acara->judul}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="judul" required>
            @if ($errors->has('judul'))
            <div class="text-xs text-red-500">
                <strong>{{ $errors->first('judul') }}</strong>
            </div>
            @endif
        </div>

        <div class="mb-4 flex gap-4 justify-center">
            <div class="w-1/2">
                <label for="tanggal_pelaksanaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Pelaksanaan</label>
                <input type="date" id="tanggal_pelaksanaan" value="{{$acara->tanggal_pelaksanaan}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="tanggal_pelaksanaan" required>
                @if ($errors->has('tanggal_pelaksanaan'))
                <div class="text-xs text-red-500">
                    <strong>{{ $errors->first('tanggal_pelaksanaan') }}</strong>
                </div>
                @endif
            </div>
            <div class="w-1/2">
                <label for="tempat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat</label>
                <input type="text" id="tempat" value="{{$acara->tempat}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="tempat" required>
                @if ($errors->has('tempat'))
                <div class="text-xs text-red-500">
                    <strong>{{ $errors->first('tempat') }}</strong>
                </div>
                @endif
            </div>
        </div>

        <div class="mb-4 flex gap-4 justify-center">
            <div class="w-1/2" >
                <label for="mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                <input type="time" id="mulai" value="{{$acara->mulai}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="mulai" required>
            </div>
            <div class="w-1/2">
                <label for="berakhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berakhir</label>
                <input type="time" id="berakhir" value="{{$acara->berakhir}}" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="berakhir" required>
            </div>
        </div>

        <div class="mb-4 flex gap-4 justify-center">
            <div class="w-1/2">
                <label for="media" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Media</label>
                <select required x-on:change="$event.target.value == 'zoom' || $event.target.value == 'gmeet' ? mediaIsOnline = true : mediaIsOnline = false" id="media" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="media">
                    @php
                        $media = ['zoom' => 'Zoom', 'gmeet' => 'Gmeet', 'offline' => 'Offline'];
                    @endphp

                    @foreach ($media as $key => $value)
                    <option {{$key == $acara->media ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                @if ($errors->has('media'))
                <div class="text-xs text-red-500">
                    <strong>{{ $errors->first('media') }}</strong>
                </div>
                @endif
            </div>
            <div class="w-1/2" x-show="mediaIsOnline">
                <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">link</label>
                <input type="text" id="link" x-bind:value="mediaIsOnline ? '{{ $acara->link }}' : '' " class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="link">
            </div>
        </div>

        <div class="mb-4 flex gap-4 justify-center" x-show="mediaIsOnline">
            <div class="w-1/2">
                <label for="id_meeting" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Meeting</label>
                <input type="text" id="id_meeting" x-bind:value="mediaIsOnline ? '{{ $acara->id_meeting }}' : '' " class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="id_meeting">
            </div>
            <div class="w-1/2">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="text" id="password" x-bind:value="mediaIsOnline ? '{{ $acara->password }}' : '' " class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="password">
            </div>
        </div>

        <div class="mx-auto text-center">
            <button type="submit" class="p-2 my-2 bg-blue-500 rounded text-white">Update</button>
        </div>
    </form>
</div>


@endsection
