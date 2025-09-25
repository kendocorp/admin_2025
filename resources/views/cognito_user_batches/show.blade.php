@extends('layouts.master')

@section('title', 'Detalle del Lote de Usuarios Cognito')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Detalle del Lote de Usuarios Cognito</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cognito_user_batches.index') }}">Lotes de Usuarios Cognito</a></li>
                <li class="breadcrumb-item active">Detalle del Lote</li>
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
              <!-- Batch Info Card -->
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Información del Lote</h5>
                </div>
                <div class="card-body">
                  @php
                    $batchInfo = [
                      'id' => 1,
                      'entity' => 'Universidad de Harvard',
                      'total_users' => 10,
                      'status' => 'Procesando',
                      'created_at' => '2024-12-01 15:45:00',
                      'finished_at' => null
                    ];
                  @endphp
                  <div class="row">
                    <div class="col-md-3">
                      <strong>ID del Lote:</strong><br>
                      <span class="text-muted">#{{ $batchInfo['id'] }}</span>
                    </div>
                    <div class="col-md-3">
                      <strong>Entidad:</strong><br>
                      <span class="text-muted">{{ $batchInfo['entity'] }}</span>
                    </div>
                    <div class="col-md-3">
                      <strong>Total Usuarios:</strong><br>
                      <span class="text-muted">{{ $batchInfo['total_users'] }}</span>
                    </div>
                    <div class="col-md-3">
                      <strong>Estado:</strong><br>
                      <span class="badge badge-warning">{{ $batchInfo['status'] }}</span>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <strong>Creado En:</strong><br>
                      <span class="text-muted">{{ $batchInfo['created_at'] }}</span>
                    </div>
                    <div class="col-md-6">
                      <strong>Finalizado En:</strong><br>
                      <span class="text-muted">{{ $batchInfo['finished_at'] ?? 'En proceso...' }}</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Users List Card -->
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Usuarios del Lote</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                      <thead class="thead-dark">
                        <tr>
                          <th class="text-center">#</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Email</th>
                          <th>Usuario Kendo</th>
                          <th>Contraseña</th>
                          <th class="text-center">Estado</th>
                          <th class="text-center">Progreso</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $users = [
                            ['id' => 1, 'name' => 'Juan', 'last_name' => 'Pérez', 'email' => 'juan.perez@harvard.edu', 'kendo_user' => 'harvard001@kendocorp.com', 'password' => 'Kd8#mN2p', 'status' => 'Completado', 'progress' => 100],
                            ['id' => 2, 'name' => 'María', 'last_name' => 'González', 'email' => 'maria.gonzalez@harvard.edu', 'kendo_user' => 'harvard002@kendocorp.com', 'password' => 'Mx9$vL4q', 'status' => 'Data Inicial', 'progress' => 80],
                            ['id' => 3, 'name' => 'Carlos', 'last_name' => 'Rodríguez', 'email' => 'carlos.rodriguez@harvard.edu', 'kendo_user' => 'harvard003@kendocorp.com', 'password' => 'Cz7&nR5t', 'status' => 'Data Inicial', 'progress' => 80],
                            ['id' => 4, 'name' => 'Ana', 'last_name' => 'Martínez', 'email' => 'ana.martinez@harvard.edu', 'kendo_user' => 'harvard004@kendocorp.com', 'password' => 'Ay6*wS3u', 'status' => 'Permisos Asignados', 'progress' => 60],
                            ['id' => 5, 'name' => 'Luis', 'last_name' => 'Hernández', 'email' => 'luis.hernandez@harvard.edu', 'kendo_user' => 'harvard005@kendocorp.com', 'password' => 'Lh4@tY8i', 'status' => 'Permisos Asignados', 'progress' => 60],
                            ['id' => 6, 'name' => 'Sofia', 'last_name' => 'López', 'email' => 'sofia.lopez@harvard.edu', 'kendo_user' => 'harvard006@kendocorp.com', 'password' => 'Sl2#oI9e', 'status' => 'Usuario Creado', 'progress' => 40],
                            ['id' => 7, 'name' => 'Diego', 'last_name' => 'García', 'email' => 'diego.garcia@harvard.edu', 'kendo_user' => 'harvard007@kendocorp.com', 'password' => 'Dg5$pA6r', 'status' => 'Usuario Creado', 'progress' => 40],
                            ['id' => 8, 'name' => 'Valentina', 'last_name' => 'Morales', 'email' => 'valentina.morales@harvard.edu', 'kendo_user' => 'harvard008@kendocorp.com', 'password' => 'Vm3&qE7y', 'status' => 'Usuario Creado', 'progress' => 40],
                            ['id' => 9, 'name' => 'Andrés', 'last_name' => 'Jiménez', 'email' => 'andres.jimenez@harvard.edu', 'kendo_user' => 'harvard009@kendocorp.com', 'password' => 'Aj1*wR4u', 'status' => 'Pendiente', 'progress' => 20],
                            ['id' => 10, 'name' => 'Camila', 'last_name' => 'Ruiz', 'email' => 'camila.ruiz@harvard.edu', 'kendo_user' => 'harvard010@kendocorp.com', 'password' => 'Cr8@tI2o', 'status' => 'Pendiente', 'progress' => 20]
                          ];
                        @endphp
                        @forelse($users as $user)
                          <tr>
                            <td class="text-center">{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['last_name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['kendo_user'] }}</td>
                            <td><code>{{ $user['password'] }}</code></td>
                            <td class="text-center">
                              @switch($user['status'])
                                @case('Completado')
                                  <span class="badge badge-success">{{ $user['status'] }}</span>
                                  @break
                                @case('Data Inicial')
                                  <span class="badge badge-info">{{ $user['status'] }}</span>
                                  @break
                                @case('Permisos Asignados')
                                  <span class="badge badge-warning">{{ $user['status'] }}</span>
                                  @break
                                @case('Usuario Creado')
                                  <span class="badge badge-primary">{{ $user['status'] }}</span>
                                  @break
                                @case('Pendiente')
                                  <span class="badge badge-secondary">{{ $user['status'] }}</span>
                                  @break
                                @default
                                  <span class="badge badge-light">{{ $user['status'] }}</span>
                              @endswitch
                            </td>
                            <td class="text-center">
                              <div class="progress" style="width: 100%; height: 20px;">
                                <div class="progress-bar 
                                  @switch($user['status'])
                                    @case('Completado')
                                      bg-success
                                      @break
                                    @case('Data Inicial')
                                      bg-info
                                      @break
                                    @case('Permisos Asignados')
                                      bg-warning
                                      @break
                                    @case('Usuario Creado')
                                      bg-primary
                                      @break
                                    @case('Pendiente')
                                      bg-secondary
                                      @break
                                    @default
                                      bg-light
                                  @endswitch
                                " role="progressbar" style="width: {{ $user['progress'] }}%" aria-valuenow="{{ $user['progress'] }}" aria-valuemin="0" aria-valuemax="100">
                                  {{ $user['progress'] }}%
                                </div>
                              </div>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="8" class="text-center">No se encontraron usuarios en este lote.</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Status Legend Card -->
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Leyenda de Estados</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <span class="badge badge-secondary">Pendiente</span>
                      <small class="d-block text-muted">En espera</small>
                    </div>
                    <div class="col-md-2">
                      <span class="badge badge-primary">Usuario Creado</span>
                      <small class="d-block text-muted">Usuario creado en Cognito</small>
                    </div>
                    <div class="col-md-2">
                      <span class="badge badge-warning">Permisos Asignados</span>
                      <small class="d-block text-muted">Permisos configurados</small>
                    </div>
                    <div class="col-md-2">
                      <span class="badge badge-info">Data Inicial</span>
                      <small class="d-block text-muted">Datos iniciales cargados</small>
                    </div>
                    <div class="col-md-2">
                      <span class="badge badge-success">Completado</span>
                      <small class="d-block text-muted">Proceso finalizado</small>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Action Buttons -->
              <div class="card">
                <div class="card-body text-center">
                  <a href="{{ route('cognito_user_batches.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver a la Lista
                  </a>
                  <button type="button" class="btn btn-info" onclick="alert('Función de reanudar lote (dummy)')">
                    <i class="fas fa-play"></i> Reanudar Lote
                  </button>
                  <button type="button" class="btn btn-warning" onclick="alert('Función de pausar lote (dummy)')">
                    <i class="fas fa-pause"></i> Pausar Lote
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection
