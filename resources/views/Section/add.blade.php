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
                            <h3 class="card-title">Add Section</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a href="{{ route('section') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form method="POST" action="{{ isset($editData) ? route('section.update', $editData->id) : route('section.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Section Name</label>
                                        <input type="text" class="form-control" name="name" id="name"  value="{{ isset($editData) ? $editData->name : old('name') }}" placeholder="Enter section name">
                                    </div>
                                    @if(isset($editData))
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" @if($editData->status==1) selected @endif>Active</option>
                                            <option value="0" @if($editData->status==0) selected @endif>Inactive</option>
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