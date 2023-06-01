@extends('admin.layout.layout')

@section('content')

    <div class="container w-auto ">
        <a href="{{route('acara.create')}}" class="m-auto">
            <button class="p-2 my-2 bg-blue-500 rounded text-white">Tambah</button>
        </a>
        <div class="card w-auto">
            <div class="card-header">Kelola Acara</div>
            <div class="card-body">
                <table id="myTable" class="table  table-stripped w-auto">
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>
@endpush
