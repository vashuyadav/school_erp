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
                            <h3 class="card-title">Add Session</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a href="{{ route('session') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form method="post" action="{{ isset($classSession) ? route('session.update', ['id' => $classSession->id]) : route('session.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Session Name</label>
                                        <input type="text" class="form-control" name="name" id="name"  value="{{ isset($classSession) ? $classSession->name : old('name') }}" placeholder="Enter session name">
                                    </div>
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <div class="input-group date" id="date" data-target-input="nearest">
                                            <input type="text" name="start_date" value="{{ isset($classSession) ? $classSession->start_date : old('start_date') }}" class="form-control datetimepicker-input" data-target="#date" />
                                            <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <div class="input-group date" id="date2" data-target-input="nearest">
                                            <input type="text" name="end_date" value="{{ isset($classSession) ? $classSession->end_date : old('end_date') }}" class="form-control datetimepicker-input" data-target="#date2" />
                                            <div class="input-group-append" data-target="#date2" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

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