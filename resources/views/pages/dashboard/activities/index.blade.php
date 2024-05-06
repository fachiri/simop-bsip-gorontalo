@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Kegiatan' => null,
    ],
])
@section('title', 'Kegiatan')
@push('css')
	<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
@endpush
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="card-title pl-1">Daftar Kegiatan</h4>
					<div class="d-flex gap-2">
						@if (auth()->user()->isPic())
							<a href="{{ route('dashboard.activities.create') }}" class="btn btn-primary btn-sm">
								<i class="bi bi-plus-square"></i>
								Tambah Data
							</a>
						@endif
					</div>
				</div>
				<div class="card-body table-responsive px-4">
					<table class="table-striped data-table table">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Tempat</th>
								<th>Tanggal</th>
								<th>Status</th>
								<th style="white-space: nowrap">Aksi</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script type="text/javascript">
		$(function() {
			const table = $('.data-table').DataTable({
				serverSide: true,
				ajax: "{{ route('dashboard.activities.index') }}",
				columns: [{
						data: 'name',
						name: 'name'
					},
					{
						data: 'place',
						name: 'place'
					},
					{
						data: 'date',
						name: 'date'
					},
					{
						data: 'status',
						name: 'status'
					},
					{
						data: 'action',
						name: 'action',
						orderable: false,
						searchable: false
					}
				]
			});
		});
	</script>
@endpush
