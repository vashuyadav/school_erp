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
                            <h3 class="card-title">Class Mapping</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a href="{{ route('class_mapping') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form method="POST" action="{{ isset($editData) ? route('class_mapping.update', $editData->id) : route('class_mapping.store') }}">
                                @csrf
                                @php
                                $classId = $sectionId = 0;
                                if(!empty($editData)){
                                    $classId = $editData['class_id'];
                                    $sectionId = $editData['section_id'];
                                }
                                @endphp
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Class Name</label>
                                        <select class="form-control" name="class_id" id="class_id">
                                            <option value="">-- Select Class --</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}" @if($classId == $class->id) selected @endif>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Section Name</label>
                                        <select class="form-control" name="section_id" id="section_id">
                                            <option value="">-- Select Section --</option>
                                            @foreach($sections as $section)
                                                <option value="{{ $section->id }}" @if($sectionId == $section->id) selected @endif>{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Teacher Name</label>
                                        <select class="form-control" name="employee_id" id="employee_id">
                                            <option value="">-- Select Teacher --</option>
                                        </select>
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