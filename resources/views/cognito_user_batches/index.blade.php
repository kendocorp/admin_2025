@extends('layouts.master')

@section('title', 'Lotes de Usuarios Cognito')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Lotes de Usuarios Cognito 
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#crearLoteModal">
                  <i class="fas fa-plus"></i> Crear Lote
                </button>

                <!-- Modal -->
                <div class="modal fade" id="crearLoteModal" tabindex="-1" role="dialog" aria-labelledby="crearLoteModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form>
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="crearLoteModalLabel">Crear Lote de Usuarios Cognito</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="entity_id" class="col-form-label" style="font-size: 1rem; font-weight: 400;">Entidad</label>
                            <select class="form-control" id="entity_id" name="entity_id" required>
                              <option value="">Seleccione una entidad</option>
                              <option value="1">Entidad Demo 1</option>
                              <option value="2">Entidad Demo 2</option>
                              <option value="3">Entidad Demo 3</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="xls_file" class="col-form-label" style="font-size: 1rem; font-weight: 400;">Archivo XLS</label>
                            <input type="file" class="form-control" id="xls_file" name="xls_file" accept=".xls,.xlsx" required>
                          </div>
                          <div class="form-group">
                            <a href="#" class="btn btn-link" download>
                              <i class="fas fa-download"></i> Descargar modelo XLS
                            </a>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <button type="button" class="btn btn-primary" onclick="alert('Guardado (dummy)!')">Guardar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </h1>
              
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Lotes de Usuarios Cognito</li>
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
                  <h5 class="card-title">Lotes de Usuarios Cognito</h5>
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
                          <th class="text-center">ID</th>
                          <th>Entidad</th>
                          <th class="text-center">Total Usuarios</th>
                          <th class="text-center">Estado</th>
                          <th class="text-center">Creado En</th>
                          <th class="text-center">Finalizado En</th>
                          <th class="text-center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $batches = [
                            ['id' => 1, 'entity' => 'Universidad de Harvard', 'total_users' => 150, 'status' => 'Completado', 'created_at' => '2024-01-15 10:30:00', 'finished_at' => '2024-01-15 11:45:00'],
                            ['id' => 2, 'entity' => 'Universidad de Stanford', 'total_users' => 89, 'status' => 'Completado', 'created_at' => '2024-03-20 14:15:00', 'finished_at' => '2024-03-20 15:30:00'],
                            ['id' => 3, 'entity' => 'MIT', 'total_users' => 234, 'status' => 'Procesando', 'created_at' => '2024-06-10 09:20:00', 'finished_at' => null],
                            ['id' => 4, 'entity' => 'UC Berkeley', 'total_users' => 67, 'status' => 'Completado', 'created_at' => '2024-07-05 16:45:00', 'finished_at' => '2024-07-05 17:20:00'],
                            ['id' => 5, 'entity' => 'Universidad de Yale', 'total_users' => 178, 'status' => 'Creado', 'created_at' => '2024-09-12 11:10:00', 'finished_at' => null],
                            ['id' => 6, 'entity' => 'Universidad de Princeton', 'total_users' => 312, 'status' => 'Completado', 'created_at' => '2024-08-22 13:25:00', 'finished_at' => '2024-08-22 14:50:00'],
                            ['id' => 7, 'entity' => 'Universidad de Chicago', 'total_users' => 45, 'status' => 'Fallido', 'created_at' => '2024-10-01 08:30:00', 'finished_at' => '2024-10-01 08:35:00'],
                            ['id' => 8, 'entity' => 'Universidad de Columbia', 'total_users' => 23, 'status' => 'Completado', 'created_at' => '2024-05-18 12:00:00', 'finished_at' => '2024-05-18 12:15:00'],
                            ['id' => 9, 'entity' => 'Universidad de Pennsylvania', 'total_users' => 201, 'status' => 'Procesando', 'created_at' => '2024-11-15 10:00:00', 'finished_at' => null],
                            ['id' => 10, 'entity' => 'Caltech', 'total_users' => 12, 'status' => 'Completado', 'created_at' => '2024-12-01 15:45:00', 'finished_at' => '2024-12-01 16:00:00']
                          ];
                        @endphp
                        @forelse($batches as $batch)
                          <tr>
                            <td class="text-center">{{ $batch['id'] }}</td>
                            <td>{{ $batch['entity'] }}</td>
                            <td class="text-center">
                              {{ $batch['total_users'] }}
                            </td>
                            <td class="text-center">
                              @switch($batch['status'])
                                @case('Completado')
                                  <span class="badge badge-success">{{ $batch['status'] }}</span>
                                  @break
                                @case('Procesando')
                                  <span class="badge badge-warning">{{ $batch['status'] }}</span>
                                  @break
                                @case('Creado')
                                  <span class="badge badge-secondary">{{ $batch['status'] }}</span>
                                  @break
                                @case('Fallido')
                                  <span class="badge badge-danger">{{ $batch['status'] }}</span>
                                  @break
                                @default
                                  <span class="badge badge-light">{{ $batch['status'] }}</span>
                              @endswitch
                            </td>
                            <td class="text-center">{{ $batch['created_at'] }}</td>
                            <td class="text-center">{{ $batch['finished_at'] ?? 'N/A' }}</td>
                            <td class="text-center">
                              <a href="{{ route('cognito_user_batches.show', $batch['id']) }}" class="btn btn-info btn-sm" title="Ver">
                                <i class="fas fa-eye"></i>
                              </a>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="7" class="text-center">No se encontraron lotes.</td>
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
