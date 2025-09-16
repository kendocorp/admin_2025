@extends('layouts.master')

@section('title', 'Cognito Users')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Cognito Users <a href="{{ route('cognito_users.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Crear Usuario</a></h1>
              
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Cognito Users</li>
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
                  <h5 class="card-title">Cognito Users</h5>
                </div>
                <div class="card-body">
                  @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('success') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif

                  @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session('error') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  @endif
                
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                      <thead class="thead-dark">
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Sub</th>
                          <th>Kendo User</th>
                          <th>Password</th>                          
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($cognito_users as $user)
                          <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->last_name ?? 'N/A' }}</td>
                            <td>{{ $user->email ?? 'N/A' }}</td>
                            <td>{{ $user->sub ?? 'N/A' }}</td>
                            <td>{{ $user->kendo_user }}</td>
                            <td>{{ $user->password ?? 'N/A' }}</td>
                            
                            <td>
                              <div class="btn-group" role="group">
                                <a href="{{ route('cognito_users.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('cognito_users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash"></i>
                                  </button>
                                </form>
                              </div>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="9" class="text-center">No cognito users found.</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>                
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection