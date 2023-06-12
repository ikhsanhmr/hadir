<a class="p-2 rounded bg-blue-500 text-white no-underline" href="{{ route('acara.edit', $model->id) }}">Edit</a>

<a href="{{ route('acara.destroy', $model->id) }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
<a href="{{ route('acara.exportPDF', $model->id) }}" class="btn btn-success" >ExportPDF</a>

