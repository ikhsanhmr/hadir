<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Absensi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- alpineJS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- datatable style --}}
    {{-- datatable style --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet"/>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

    <div class="flex gap-5 m-10" x-data="inputAgency()">
        <div class="w-[40%] bg-white border border-gray-200 rounded-lg shadow">
            <form action="{{url('absensi/'.$acara->id)}}" method="POST">
                @csrf
                <input type="hidden" name="acara_id" value="{{$acara->id}}">
                <div class="p-3 mb-2 bg-cyan-500 rounded-lg text-white">
                    <h5 class="text-2xl font-bold mb-2 ">{{$acara->judul}}</h5>
                    <div class="flex gap-5 ">

                        <div class="flex gap-3 ">
                            <p class=" mb-2 text-sm dark:text-white"><b> Pelaksanaan</b> : {{Carbon\Carbon::createFromFormat('Y-m-d', $acara->tanggal_pelaksanaan)->format('d/m/Y')}}</p>

                            <span class="text-sm">|</span>

                            <p class=" mb-2 text-sm dark:text-white"><b>Waktu</b> : {{Carbon\Carbon::createFromFormat('H:i:s', $acara->mulai)->format('H.i')}} - {{Carbon\Carbon::createFromFormat('H:i:s', $acara->berakhir)->format('H.i')}}</p>
                        </div>

                    </div>

                    <p class=" mb-2 text-sm dark:text-white"><b>Tempat</b> : {{$acara->tempat}}</p>

                    <div class="flex gap-5 ">

                        <div class="flex gap-3 ">
                            <p class=" mb-2 text-sm dark:text-white"><b> Media</b> : {{$acara->media}}</p>

                            <span class="text-sm">,</span>

                            <p class=" mb-2 text-sm dark:text-white"><b>ID Meeting</b> : {{$acara->id_meeting == "" || $acara->id_meeting == null ? '-' : $acara->id_meeting}}</p>

                            <span class="text-sm">,</span>

                            <p class=" mb-2 text-sm dark:text-white"><b>Password</b> : {{$acara->password == "" || $acara->password == null ? '-' : $acara->password}}</p>
                        </div>

                    </div>

                </div>
                <div class="m-4">
                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" id="nama" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nama" required placeholder="Peserta">
                        @if ($errors->has('nama'))
                        <div class="text-xs text-red-500">
                            <strong>{{ $errors->first('nama') }}</strong>
                        </div>
                        @endif
                    </div>
                    <div class="mb-4">
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                        <input type="text" id="nip" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nip" required placeholder="nip">
                        @if ($errors->has('nip'))
                        <div class="text-xs text-red-500">
                            <strong>{{ $errors->first('nip') }}</strong>
                        </div>
                        @endif
                    </div>
                    <div class="mb-4">
                        <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instansi</label>
                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <input x-on:click="close" checked id="inline-radio" type="radio" name="instansi" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="PLN Tarakan">
                                <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PLN Tarakan</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input x-on:click="close" id="inline-2-radio" type="radio" value="PLN" name="instansi" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PLN</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="inline-checked-radio" type="radio" x-on:click="display"  name="instansi" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lainnya</label>
                            </div>
                        </div>

                        <input x-show="isOpen()" type="text" class="block w-full p-2 text-gray-900 border mt-4 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="isOpen() ? '' : '' " name="instansi_lain"  placeholder="Instansi lain">

                    </div>

                    <div class="mb-4">
                        <div class="flex gap-2">
                            <input type="text" id="divisi" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="divisi" required placeholder="Divisi / Unit">
                            <input type="text" id="jabatan" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="jabatan" required placeholder="Jabatan">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="media" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email / No Handphone (optional)</label>
                        <div class="flex gap-2">
                            <input type="email" id="email" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" placeholder="e-mail">
                            <input type="number" id="no_hp" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="no_hp" required placeholder="No.HP">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="media" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Media</label>
                        <select required  id="media" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="media">
                            <option selected>Pilih</option>
                            <option value="zoom">Zoom</option>
                            <option value="gmeet">Gmeet</option>
                            <option value="offline">Offline</option>
                        </select>
                        @if ($errors->has('media'))
                        <div class="text-xs text-red-500">
                            <strong>{{ $errors->first('media') }}</strong>
                        </div>
                        @endif
                    </div>

                </div>

                <div class="mx-auto text-center">
                    <button type="submit" class="p-2 my-2 bg-cyan-500 rounded text-white">Submit</button>
                </div>
            </form>
        </div>
        <div class="w-[60%] p-6 bg-white border border-gray-200 rounded-lg shadow">
            <table id="myTable" class="table  table-stripped">
                <thead>
                    <tr>

                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Instansi</th>
                        <th>Divisi</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    @include('sweetalert::alert')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>

        let id = "{!!$acara->id!!}";
        $(function() {
        let table = new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: "{{ url('absensi/ajax/{id}') }}".replace('{id}', id),
            columns:[
            {data: 'nama', name: 'pesertas.nama'},
            {data: 'nip', name: 'pesertas.nip'},
            {data: 'instansi', name: 'pesertas.instansi'},
            {data: 'divisi', name: 'pesertas.divisi'},
            {data: 'jabatan', name: 'pesertas.jabatan'}
            ]
        });
    });

        function inputAgency() {
            return {
                show: false,
                display() { this.show = true },
                close(e) { this.show = false},
                isOpen() { return this.show === true }
            }
        }
    </script>
</body>
</html>
