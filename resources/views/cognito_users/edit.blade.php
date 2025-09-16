@extends('layouts.master')

@section('title', 'Edit Cognito User')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Cognito User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cognito_users.index') }}">Cognito Users</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Edit Cognito User: {{ $cognitoUser->name }}</h5>
                </div>
                <div class="card-body">
                  @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session('error') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif

                  <form action="{{ route('cognito_users.update', $cognitoUser->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="name">Name <span class="text-danger">*</span></label>
                          <input type="text" 
                                 class="form-control @error('name') is-invalid @enderror" 
                                 id="name" 
                                 name="name" 
                                 value="{{ old('name', $cognitoUser->name) }}" 
                                 required>
                          @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="last_name">Last Name</label>
                          <input type="text" 
                                 class="form-control @error('last_name') is-invalid @enderror" 
                                 id="last_name" 
                                 name="last_name" 
                                 value="{{ old('last_name', $cognitoUser->last_name) }}">
                          @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" 
                                 class="form-control @error('email') is-invalid @enderror" 
                                 id="email" 
                                 name="email" 
                                 value="{{ old('email', $cognitoUser->email) }}">
                          @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="kendo_user">Kendo User <span class="text-danger">*</span></label>
                          <input type="text" 
                                 class="form-control @error('kendo_user') is-invalid @enderror" 
                                 id="kendo_user" 
                                 name="kendo_user" 
                                 value="{{ old('kendo_user', $cognitoUser->kendo_user) }}" 
                                 required>
                          @error('kendo_user')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password">Password <span class="text-danger">*</span></label>
                          <input type="text" 
                                 class="form-control @error('password') is-invalid @enderror" 
                                 id="password" 
                                 name="password" 
                                 value="{{ old('password', $cognitoUser->password) }}" 
                                 required>
                          @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="sub">Sub</label>
                          <input type="text" 
                                 class="form-control @error('sub') is-invalid @enderror" 
                                 id="sub" 
                                 name="sub" 
                                 value="{{ old('sub', $cognitoUser->sub) }}">
                          @error('sub')
                            <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update User
                      </button>
                      <a href="{{ route('cognito_users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                      </a>
                    </div>
                  </form>
                </div>                
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
