@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => null,
    ],
])
@section('title', 'Dasbor')
@push('css')
	<link rel="stylesheet" href="{{ asset('css/iconly.css') }}">
@endpush
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body py-4-5 px-4">
							<div class="row">
								<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
									<div class="stats-icon purple mb-2">
										<i class="iconly-boldUser"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold">Pengguna</h6>
									<div class="d-flex align-items-center justify-content-between">
										<h6 class="mb-0 font-extrabold">{{ str_pad($users->count(), 3, '0', STR_PAD_LEFT) }}</h6>
										<a href="{{ route('dashboard.master.users.index') }}">
											Detail
											<i class="bi bi-chevron-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body py-4-5 px-4">
							<div class="row">
								<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
									<div class="stats-icon purple mb-2">
										<i class="iconly-boldUser"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold">PJ</h6>
									<div class="d-flex align-items-center justify-content-between">
										<h6 class="mb-0 font-extrabold">{{ str_pad($pics->count(), 3, '0', STR_PAD_LEFT) }}</h6>
										<a href="{{ route('dashboard.master.pics.index') }}">
											Detail
											<i class="bi bi-chevron-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body py-4-5 px-4">
							<div class="row">
								<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
									<div class="stats-icon purple mb-2">
										<i class="iconly-boldCalendar"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold">Kegiatan</h6>
									<div class="d-flex align-items-center justify-content-between">
										<h6 class="mb-0 font-extrabold">{{ str_pad($activities->count(), 3, '0', STR_PAD_LEFT) }}</h6>
										<a href="{{ route('dashboard.activities.index') }}">
											Detail
											<i class="bi bi-chevron-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-6 col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body py-4-5 px-4">
							<div class="row">
								<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
									<div class="stats-icon purple mb-2">
										<i class="iconly-boldImage"></i>
									</div>
								</div>
								<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
									<h6 class="text-muted font-semibold">Dokumentasi</h6>
									<div class="d-flex align-items-center justify-content-between">
										<h6 class="mb-0 font-extrabold">{{ str_pad($documentations->count(), 3, '0', STR_PAD_LEFT) }}</h6>
										<a href="{{ route('dashboard.documentations.index') }}">
											Detail
											<i class="bi bi-chevron-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	{{-- <script src="{{ asset('js/extensions/apexcharts.min.js') }}"></script>
  <script src="{{ asset('js/static/dashboard.js') }}"></script> --}}
@endpush
