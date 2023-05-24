<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absensi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>


<div class="block m-10 p-6 bg-white border border-gray-200 rounded-lg shadow ">
    <div class="flex justify-between">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Acara Hari Ini</h5>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{Carbon\Carbon::create(now(), 'Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM YYYY')}}</h5>
    </div>
    <div class="flex">
        @foreach ($acaras as $acara)
        <a href="{{url('absensi/'.$acara->id)}}" class="block w-1/3 m-10 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="text-1xl font-bold text-gray-900">{{$acara->judul}}</h5>


            <table class="w-full my-4 text-sm text-left text-gray-500 dark:text-gray-400 ">

                <tbody class="">

                    <tr class="dark:bg-gray-800">
                        <td class="w-[40%] px-6 py-1 font-bold">
                            Tanggal
                        </td>
                        <td>:</td>
                        <td class="px-6 py-1">
                            {{Carbon\Carbon::create($acara->tanggal_pelaksanaan, 'Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM YYYY')}}
                        </td>
                    </tr>

                    <tr class="dark:bg-gray-800">
                        <td class="w-[40%] px-6 py-1 font-bold">
                            Waktu
                        </td>
                        <td>:</td>
                        <td class="px-6 py-1">
                            {{Carbon\Carbon::create($acara->mulai, 'Asia/Jakarta')->locale('id')->isoFormat('HH:mm')}} - {{Carbon\Carbon::create($acara->berakhir, 'Asia/Jakarta')->locale('id')->isoFormat('HH:mm')}}
                        </td>
                    </tr>

                    <tr class="dark:bg-gray-800">
                        <td class="w-[40%] px-6 py-1 font-bold">
                            Tempat
                        </td>
                        <td>:</td>
                        <td class="px-6 py-1">
                            {{$acara->tempat}}
                        </td>
                    </tr>

                    <tr class="dark:bg-gray-800">
                        <td class="w-[40%] px-6 py-1 font-bold">
                            Media
                        </td>
                        <td>:</td>
                        <td class="px-6 py-1">
                            {{$acara->media}}
                        </td>
                    </tr>

                    <tr class="dark:bg-gray-800">
                        <td class="w-[40%] px-6 py-1 font-bold">
                            link
                        </td>
                        <td>:</td>
                        <td class="px-6 py-1">
                            {{$acara->link == '' ? '-' : $acara->link}}
                        </td>
                    </tr>

                    <tr class="dark:bg-gray-800">
                        <td class="w-[40%] px-6 py-1 font-bold">
                            ID Meeting
                        </td>
                        <td>:</td>
                        <td class="px-6 py-1">
                            {{$acara->id_meeting == '' ? '-' : $acara->id_meeting}}
                        </td>
                    </tr>

                    <tr class="dark:bg-gray-800">
                        <td class="w-[40%] px-6 py-1 font-bold">
                            Password
                        </td>
                        <td>:</td>
                        <td class="px-6 py-1">
                            {{$acara->password == '' ? '-' : $acara->password}}
                        </td>
                    </tr>


                </tbody>
            </table>
        </a>
        @endforeach
    </div>

    {{ $acaras->links() }}
</div>


</body>
</html>
