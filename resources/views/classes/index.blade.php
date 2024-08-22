@extends('layouts.admin.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Session List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Session</li>
                    </ol>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('success') }}
                        </div>    
                        @endif
                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{ session('error') }}
                        </div>    
                        @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Classes</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-filter"></i> Fillter</a> &nbsp;
                                    <a href="{{ route('classes.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Class</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>                                        
                                        <th>Status</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($classes) > 0)
                                    @foreach($classes as $class)
                                    <tr>
                                        @php
                                        $id = $class->id;
                                        @endphp
                                        <td>{{$class->id}}</td>
                                        <td>{{$class->name}}</td>
                                        <td>
                                            @if($class->trashed())
                                                Deleted
                                            @else
                                                @if($class->status==1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif    
                                            @endif
                                            
                                        </td>
                                        <td>
                                            @if($class->trashed())
                                                <a href="{{ route('classes.restore', ['id' => $id]) }}" class="btn btn-danger" title="Restore"><i class="fa fa-reply"></i></a>
                                            @else
                                            <a href="{{ route('classes.edit', $id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $id }}').submit();">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $id }}" action="{{ route('classes.destroy', $id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                    @else
                                    <tr>
                                        <td colspan="10" style="text-align: center;">No record found !</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection