@extends('admin.layout.layout')

@section('content')

    <div class="container">
        <a href="{{route('acara.create')}}" class="">
            <button class="p-2 my-2 bg-blue-500 rounded text-white">Tambah</button>
        </a>
        <div class="card">
            <div class="card-header">Kelola Acara</div>
            <div class="card-body">
                <table id="myTable" class="table  table-stripped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
    let table = new DataTable('#myTable', {
        processing: true,
        serverSide: true,
        ajax: '{{ route('acara.index') }}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'judul', name: 'judul'},
            {data: 'tanggal_pelaksanaan', name: 'tanggal_pelaksanaan'},
            {data: 'action', name: 'action'}
        ]
    });


</script>
@endpush
