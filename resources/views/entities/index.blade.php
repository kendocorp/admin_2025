@extends('layouts.master')

@section('title', 'Entities')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Entities <a href="{{ route('entities.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Crear Entidad</a></h1>
              
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Entities</li>
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
                  <h5 class="card-title">Entities</h5>
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
                          <th>Type</th>
                          <th>Location</th>
                          <th>Founded</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $universities = [
                            ['id' => 1, 'name' => 'Harvard University', 'type' => 'Private', 'location' => 'Cambridge, MA', 'founded' => '1636', 'status' => 'Active'],
                            ['id' => 2, 'name' => 'Stanford University', 'type' => 'Private', 'location' => 'Stanford, CA', 'founded' => '1885', 'status' => 'Active'],
                            ['id' => 3, 'name' => 'Massachusetts Institute of Technology', 'type' => 'Private', 'location' => 'Cambridge, MA', 'founded' => '1861', 'status' => 'Active'],
                            ['id' => 4, 'name' => 'University of California, Berkeley', 'type' => 'Public', 'location' => 'Berkeley, CA', 'founded' => '1868', 'status' => 'Active'],
                            ['id' => 5, 'name' => 'Yale University', 'type' => 'Private', 'location' => 'New Haven, CT', 'founded' => '1701', 'status' => 'Active'],
                            ['id' => 6, 'name' => 'Princeton University', 'type' => 'Private', 'location' => 'Princeton, NJ', 'founded' => '1746', 'status' => 'Active'],
                            ['id' => 7, 'name' => 'University of Chicago', 'type' => 'Private', 'location' => 'Chicago, IL', 'founded' => '1890', 'status' => 'Active'],
                            ['id' => 8, 'name' => 'Columbia University', 'type' => 'Private', 'location' => 'New York, NY', 'founded' => '1754', 'status' => 'Active'],
                            ['id' => 9, 'name' => 'University of Pennsylvania', 'type' => 'Private', 'location' => 'Philadelphia, PA', 'founded' => '1740', 'status' => 'Active'],
                            ['id' => 10, 'name' => 'California Institute of Technology', 'type' => 'Private', 'location' => 'Pasadena, CA', 'founded' => '1891', 'status' => 'Active']
                          ];
                        @endphp
                        @forelse($universities as $university)
                          <tr>
                            <td>{{ $university['id'] }}</td>
                            <td>{{ $university['name'] }}</td>
                            <td>{{ $university['type'] }}</td>
                            <td>{{ $university['location'] }}</td>
                            <td>{{ $university['founded'] }}</td>
                            <td>
                              <span class="badge badge-success">{{ $university['status'] }}</span>
                            </td>
                            <td>
                              <div class="btn-group" role="group">
                                <a href="{{ route('entities.edit', $university['id']) }}" class="btn btn-warning btn-sm" title="Edit">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('entities.destroy', $university['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this entity?')">
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
                            <td colspan="7" class="text-center">No entities found.</td>
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
