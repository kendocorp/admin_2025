@extends('layouts.master')

@section('title', 'Cognito Users')

@section('head')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap4.min.css">
@endsection

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
                    <table id="cognitoUsersTable" class="table table-bordered table-striped table-sm">
                      <thead class="thead-dark">
                        <tr>
                          <th>ID</th>
                          <th>Kendo User</th>
                          <th>Sub</th>
                          <th>Password</th>                          
                          <th>Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>                        
                        @forelse($cognito_users as $user)
                          <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['kendo_user'] }}</td>
                            <td>{{ $user['sub'] ?? 'N/A' }}</td>
                            <td><code>{{ $user['password'] ?? 'N/A' }}</code></td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['last_name'] ?? 'N/A' }}</td>
                            <td>{{ $user['email'] ?? 'N/A' }}</td>
                            <td>{{ $user['status'] ?? 'N/A' }}</td>
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

@section('scripts')
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    $('#cognitoUsersTable').DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "pageLength": 25,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        },
        "columnDefs": [
            {
                "targets": [8], // Actions column (index 8)
                "orderable": false,
                "searchable": false
            }
        ],
        "order": [[ 0, "desc" ]], // Sort by ID descending by default
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-success btn-sm',
                title: 'Cognito Users - ' + new Date().toLocaleDateString(),
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7] // Export all columns except Actions
                }
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv"></i> CSV',
                className: 'btn btn-info btn-sm',
                title: 'Cognito Users - ' + new Date().toLocaleDateString(),
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7] // Export all columns except Actions
                }
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf"></i> PDF',
                className: 'btn btn-danger btn-sm',
                title: 'Cognito Users - ' + new Date().toLocaleDateString(),
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7] // Export all columns except Actions
                }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Print',
                className: 'btn btn-secondary btn-sm',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7] // Export all columns except Actions
                }
            }
        ]
    });
});
</script>
@endsection