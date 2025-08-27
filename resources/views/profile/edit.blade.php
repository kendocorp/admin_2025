@extends('layouts.master')

@section('title', 'Profile')

@section('content')
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Profile</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard v1</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					@include('profile.partials.update-profile-information-form')
				</div>
				<div class="col-md-4">
					@include('profile.partials.update-password-form')
				</div>
				<div class="col-md-4">
					@include('profile.partials.delete-user-form')
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
@endsection
