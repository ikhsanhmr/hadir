<!DOCTYPE html>
<html lang="en">
{{-- kurang bisa input ke database --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Absensi</title>
    <link rel="stylesheet" href="responsive.css">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])

    {{-- alpineJS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- datatable style --}}
    {{-- datatable style --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html,
        body {
          height: 100%;
        }

        @media (min-width: 640px) {
          table {
            display: inline-table !important;
          }

          thead tr:not(:first-child) {
            display: none;
          }
        }

        td:not(:last-child) {
          border-bottom: 0;
        }

        th:not(:last-child) {
          border-bottom: 2px solid rgba(0, 0, 0, .1);
        }
      </style>
</head>
<!-- component -->
<!-- component -->
<div class="bg-gradient-to-b from-pink-100 to-purple-200">
    <div class="container m-auto px-6 py-20 md:px-12 lg:px-30 ">
        <div class="m-auto text-center lg:w-8/12 xl:w-7/12">
            <h2 class="text-2xl text-pink-900 font-bold md:text-4xl mb-15">Form Absensi</h2>
        </div>
        <div class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
            <div class="relative z-10 -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
                <div aria-hidden="true"
                    class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110">
                </div>
                <div class="relative pt-6 pb-1 lg:p-8">
                    <h2 class="text-3xl text-gray-700 font-semibold text-center mb-2">{{ $acara->judul }}</h2>
                    <h3 class="text-sm dark:text-white-700 text-center">
                        <p>{{Carbon\Carbon::createFromFormat('Y-m-d', $acara->tanggal_pelaksanaan)->format('d/m/Y')}} |
                            {{Carbon\Carbon::createFromFormat('H:i:s', $acara->mulai)->format('H.i')}} -
                            {{Carbon\Carbon::createFromFormat('H:i:s', $acara->berakhir)->format('H.i')}}</p>
                    </h3>
                    <h4 class="text-sm dark:text-white-700 text-center"> {{$acara->tempat}} | {{$acara->media}} </h4>
                    <h4 class="text-sm dark:text-white-700  text-center"> <b>ID</b> :
                        {{ $acara->id_meeting == "" || $acara->id_meeting == null ? '-' : $acara->id_meeting }}
                        <b>Password</b> :
                        {{$acara->password == "" || $acara->password == null ? '-' : $acara->password}}</p>
                    </h4>
                    <div>
                    </div>
                    <form action="{{url('absensi/'.$acara->id)}}" method="POST">
                        @csrf
                        <input type="hidden" name="acara_id" value="{{$acara->id}}">
                        <div class="w-auto space-y-4 py-2 p-auto m-auto text-gray-900">
                            <div>
                                <span><label for="nama" class="block mb-0 text-sm text-center font-medium text-gray-900 dark:text-white-700">Nama</label></span>
                                <div><input type="text" id="nama" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " name="nama" required placeholder="Peserta">
                                    @if ($errors->has('nama'))
                                    <div class="text-xs text-red-500">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </div>
                                    @endif</div>
                            </div>
                            <div>
                                <span><label for="nip" class="block mb-0 text-sm text-center font-medium text-gray-900 dark:text-white-700">NIP</label></span>
                                <input type="text" id="nip" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="nip" required placeholder="nip">
                                @if ($errors->has('nip'))
                                <div class="text-xs text-red-500">
                                    <strong>{{ $errors->first('nip') }}</strong>
                                </div>
                                @endif
                            </div>

                            <div>
                                <label for="instansi" class="block mb-1 text-sm text-center font-medium text-gray-900 dark:text-white-700">Instansi</label></span>
                                <div class="flex item-center">
                                    <div class="flex items-center mr-4">
                                        <input x-on:click="close" checked id="inline-radio" type="radio" name="instansi"class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            value="PLN Tarakan">
                                        <label for="inline-radio"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">PLN
                                            Tarakan</label>
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input x-on:click="close" id="inline-2-radio" type="radio" value="PLN" name="instansi" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">PLN</label>
                                    </div>
                                    <div class="flex items-center mr-4">
                                        <input id="inline-checked-radio" type="radio" x-on:click="display" name="instansi" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">Lainnya</label>
                                    </div>
                                </div>
                                <div>
                                    <input x-show="isOpen()" type="text" class="block w-full p-2 text-gray-900 border mt-4 border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" :value="isOpen() ? '' : '' " name="instansi_lain" placeholder="Instansi lain">
                                </div>
                                <div class="mb-4">
                                    <div class="flex gap-2">
                                        <input type="text" id="divisi" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="divisi" required placeholder="Divisi / Unit">
                                        <input type="text" id="jabatan" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="jabatan" required placeholder="Jabatan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="media"class="block mb-2 text-center text-sm font-medium text-gray-900 dark:text-white-500">Email/ No Handphone (optional)</label>
                            <div class="flex gap-2">
                                <input type="email" id="email" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" placeholder="e-mail">
                                <input type="number" id="no_hp"
                                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="no_hp" required placeholder="No.HP">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="media"
                                class="block mb-2 text-center text-sm font-medium text-gray-900 dark:text-white-500">Pilih
                                Media</label>
                            <select required id="media"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="media">
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
                        <button type="submit" title="Submit"
                            class="block w-full py-3 px-6 text-center rounded-xl transition bg-purple-600 hover:bg-purple-700 active:bg-purple-800 focus:bg-indigo-600">
                            <span class="text-white font-semibold">
                                Submit
                            </span>
                        </button>
                </div>
                </form>
            </div>

            <div class="relative group md:w-6/12 lg:w-10/12">
                <div aria-hidden="true"
                    class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105">
                </div>
                <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                    <!-- component -->
                    <table id="myTable"
                        class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                        <thead class="text-white">
                            <tr
                                class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                                <th class="p-3 text-left">Nama</th>
                                <th class="p-3 text-left">NIP</th>
                                <th class="p-3 text-left">Instansi</th>
                                <th class="p-3 text-left">Divisi</th>
                                <th class="p-3 text-left">Jabatan</th>
                            </tr>
                        </thead>
                        <tbody class="flex-1 sm:flex-none">
                            <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                                @foreach ($peserta as $item)
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{ $item->nama}}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{ $item->nip }}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{ $item->instansi }}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{ $item->divisi }}</td>
                                <td class="border-grey-light border hover:bg-gray-100 p-3">{{ $item->jabatan }}</td>
                                @endforeach
				            </tr>

                            <a type="submit" title="export"
                            class="block w-full py-3 px-6 text-center rounded-xl transition bg-green-600 hover:bg-blue-700 active:bg-purple-800 focus:bg-indigo-600">
                            <span class="text-white font-semibold">
                                Export PDF
                            </span>
                        </a>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/r-2.4.1/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

{{-- <script>
    let id = "{!!$acara->id!!}";
    $(function () {
        let table = new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: "{{ url('absensi/ajax/{id}') }}".replace('{id}', id),
            columns: [{
                    data: 'nama',
                    name: 'pesertas.nama'
                },
                {
                    data: 'nip',
                    name: 'pesertas.nip'
                },
                {
                    data: 'instansi',
                    name: 'pesertas.instansi'
                },
                {
                    data: 'divisi',
                    name: 'pesertas.divisi'
                },
                {
                    data: 'jabatan',
                    name: 'pesertas.jabatan'
                }
            ]
        });
    });

    function inputAgency() {
        return {
            show: false,
            display() {
                this.show = true
            },
            close(e) {
                this.show = false
            },
            isOpen() {
                return this.show === true
            }
        }
    }
</script>--}}
</html>
