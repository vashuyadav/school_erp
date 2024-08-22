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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Class</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a href="{{ route('classes.index') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form method="POST" action="{{ isset($classData) ? route('classes.update', $classData->id) : route('classes.store') }}">
                                @csrf
                                @if(isset($classData))
                                    @method('PUT')
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Class Name</label>
                                        <input type="text" class="form-control" name="name" id="name"  value="{{ isset($classData) ? $classData->name : old('name') }}" placeholder="Enter class name">
                                    </div>
                                    @if(isset($classData))
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" @if($classData->status==1) selected @endif>Active</option>
                                            <option value="0" @if($classData->status==0) selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                    @endif
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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