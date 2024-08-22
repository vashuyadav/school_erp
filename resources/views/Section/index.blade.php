@extends('layouts.admin.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    
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
                            <h3 class="card-title">Sections</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-filter"></i> Fillter</a> &nbsp;
                                    <a href="{{ route('section.add') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Section</a>
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
                                    @if(count($sections) > 0)
                                    @foreach($sections as $data)
                                    <tr>
                                        @php
                                        $id = $data->id;
                                        @endphp
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>
                                        @if($data->status==1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                            
                                        </td>
                                        <td>
                                            <a href="{{ route('section.edit', $id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="#" class="btn btn-danger" data-id="{{ $id }}" onclick="deleteRow(this);">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $id }}" action="{{ route('section.delete', $id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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