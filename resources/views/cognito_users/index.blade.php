@extends('layouts.master')

@section('title', 'Cognito Users')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Cognito Users 
                <a href="{{ route('cognito_users.create') }}" class="btn btn-success btn-sm">
                  <i class="fas fa-plus"></i> Crear Usuario
                </a>
                <a href="{{ route('cognito_user_batches.index') }}" class="btn btn-success btn-sm">
                  <i class="fas fa-upload"></i> Crear Batch
                </a>
              </h1>
              
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
                        @php
                          $cognito_users = [
                            ['id' => 1, 'name' => 'Juan', 'last_name' => 'Pérez', 'email' => 'juan.perez@harvard.edu', 'sub' => 'sub-001', 'kendo_user' => 'harvard001@kendocorp.com', 'password' => 'Kd8#mN2p'],
                            ['id' => 2, 'name' => 'María', 'last_name' => 'González', 'email' => 'maria.gonzalez@harvard.edu', 'sub' => 'sub-002', 'kendo_user' => 'harvard002@kendocorp.com', 'password' => 'Mx9$vL4q'],
                            ['id' => 3, 'name' => 'Carlos', 'last_name' => 'Rodríguez', 'email' => 'carlos.rodriguez@harvard.edu', 'sub' => 'sub-003', 'kendo_user' => 'harvard003@kendocorp.com', 'password' => 'Cz7&nR5t'],
                            ['id' => 4, 'name' => 'Ana', 'last_name' => 'Martínez', 'email' => 'ana.martinez@harvard.edu', 'sub' => 'sub-004', 'kendo_user' => 'harvard004@kendocorp.com', 'password' => 'Ay6*wS3u'],
                            ['id' => 5, 'name' => 'Luis', 'last_name' => 'Hernández', 'email' => 'luis.hernandez@harvard.edu', 'sub' => 'sub-005', 'kendo_user' => 'harvard005@kendocorp.com', 'password' => 'Lh4@tY8i'],
                            ['id' => 6, 'name' => 'Sofia', 'last_name' => 'López', 'email' => 'sofia.lopez@harvard.edu', 'sub' => 'sub-006', 'kendo_user' => 'harvard006@kendocorp.com', 'password' => 'Sl2#oI9e'],
                            ['id' => 7, 'name' => 'Diego', 'last_name' => 'García', 'email' => 'diego.garcia@harvard.edu', 'sub' => 'sub-007', 'kendo_user' => 'harvard007@kendocorp.com', 'password' => 'Dg5$pA6r'],
                            ['id' => 8, 'name' => 'Valentina', 'last_name' => 'Morales', 'email' => 'valentina.morales@harvard.edu', 'sub' => 'sub-008', 'kendo_user' => 'harvard008@kendocorp.com', 'password' => 'Vm3&qE7y'],
                            ['id' => 9, 'name' => 'Andrés', 'last_name' => 'Jiménez', 'email' => 'andres.jimenez@harvard.edu', 'sub' => 'sub-009', 'kendo_user' => 'harvard009@kendocorp.com', 'password' => 'Aj1*wR4u'],
                            ['id' => 10, 'name' => 'Camila', 'last_name' => 'Ruiz', 'email' => 'camila.ruiz@harvard.edu', 'sub' => 'sub-010', 'kendo_user' => 'harvard010@kendocorp.com', 'password' => 'Cr8@tI2o']
                          ];
                        @endphp
                        @forelse($cognito_users as $user)
                          <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['last_name'] ?? 'N/A' }}</td>
                            <td>{{ $user['email'] ?? 'N/A' }}</td>
                            <td>{{ $user['sub'] ?? 'N/A' }}</td>
                            <td>{{ $user['kendo_user'] }}</td>
                            <td><code>{{ $user['password'] ?? 'N/A' }}</code></td>
                            
                            <td>
                              <div class="btn-group" role="group">
                                <a href="{{ route('cognito_users.edit', $user['id']) }}" class="btn btn-warning btn-sm" title="Edit">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reiniciarDataModal{{ $user['id'] }}" title="Reiniciar Data Inicial">
                                  <i class="fas fa-redo"></i>
                                </button>
                                <form action="{{ route('cognito_users.destroy', $user['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
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
                            <td colspan="8" class="text-center">No cognito users found.</td>
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

      <!-- Modales para Reiniciar Data Inicial de cada usuario -->
      @foreach($cognito_users as $user)
      <div class="modal fade" id="reiniciarDataModal{{ $user['id'] }}" tabindex="-1" role="dialog" aria-labelledby="reiniciarDataModal{{ $user['id'] }}Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="reiniciarDataModal{{ $user['id'] }}Label">Reiniciar Data Inicial - {{ $user['name'] }} {{ $user['last_name'] }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="alert alert-warning" role="alert">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>¡Advertencia!</strong> Esta acción reiniciará los datos iniciales para este usuario específico.
              </div>
              <p><strong>Usuario:</strong> {{ $user['name'] }} {{ $user['last_name'] }}</p>
              <p><strong>Email:</strong> {{ $user['email'] }}</p>
              <p><strong>Kendo User:</strong> {{ $user['kendo_user'] }}</p>
              <p>¿Está seguro de que desea proceder con el reinicio de la data inicial para este usuario?</p>
              <p><strong>Esta acción:</strong></p>
              <ul>
                <li>Eliminará los datos iniciales existentes para este usuario</li>
                <li>Reiniciará el proceso de configuración</li>
                <li>No se puede deshacer</li>
              </ul>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fas fa-times"></i> Cancelar
              </button>
              <button type="button" class="btn btn-primary" onclick="alert('Data inicial reiniciada para {{ $user['name'] }} {{ $user['last_name'] }} (dummy)!')">
                <i class="fas fa-redo"></i> Aceptar y Reiniciar
              </button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
@endsection