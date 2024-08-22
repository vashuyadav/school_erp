@extends('layouts.admin.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <h3 class="card-title">Add Employee</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <a href="{{ route('employee') }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-circle-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <form method="POST" action="{{ isset($editData) ? route('employee.update', $editData->id) : route('employee.store') }}">
                                @csrf
                                <div class="row">
                                    @php
                                    $empTypeId = $deptId = $designationId = $religionId = $categoryId = 0;
                                    if(!empty($editData)){
                                    $empTypeId = $editData['emp_type'];
                                    $deptId = $editData['department_id'];
                                    $designationId = $editData['designation_id'];
                                    $religionId = $editData['religion_id'];
                                    $categoryId = $editData['category_id'];
                                    $stateId = $editData['state_id'];
                                    }

                                    @endphp
                                    <div class="col-6">
                                        <div class="card-body">
                                            <h4>Personal Information</h4>

                                            <div class="form-group">
                                                <label for="emp_type">Employee Type</label>
                                                <select class="form-control" name="emp_type" id="emp_type">
                                                    <option value="">-- Select Type --</option>
                                                    @foreach(config('settings.EMPLOYEE_TYPE') as $key => $value)
                                                    <option value="{{ $key }}" @if($key==$empTypeId) selected @endif>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="department_id">Department</label>
                                                <select class="form-control" name="department_id" id="department_id">
                                                    <option value="">-- Select Type --</option>
                                                    @foreach($departments as $dep)
                                                    <option value="{{ $dep->id }}" @if($dep->id == $deptId) selected @endif>{{ $dep->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="designation_id">Designation</label>
                                                <select class="form-control" name="designation_id" id="designation_id">
                                                    <option value="">-- Select Designation --</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" class="form-control" name="first_name" id="first_name" value="{{ isset($editData) ? $editData->first_name : old('first_name') }}" placeholder="Enter first name">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" class="form-control" name="last_name" id="last_name" value="{{ isset($editData) ? $editData->last_name : old('last_name') }}" placeholder="Enter last name">
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Gender</label><br>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary1" name="gender" value="1">
                                                    <label for="radioPrimary1">Male &nbsp;&nbsp;</label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary2" name="gender" value="2">
                                                    <label for="radioPrimary2">Female &nbsp;&nbsp;</label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" id="radioPrimary3" name="gender" value="3">
                                                    <label for="radioPrimary3">Other</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="emp_type">Religion</label>
                                                <select class="form-control" name="religion_id" id="religion_id">
                                                    <option value="">-- Select Religion --</option>
                                                    @foreach($religions as $religion)
                                                    <option value="{{ $religion->id }}" @if($religion->id==$religionId) selected @endif>{{ $religion->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="emp_type">Category</label>
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option value="">-- Select Category --</option>
                                                    @foreach($categorys as $cat)
                                                    <option value="{{ $cat->id }}" @if($cat->id==$categoryId) selected @endif>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Joining Date</label>
                                                <div class="input-group date" id="date" data-target-input="nearest">
                                                    <input type="text" name="joining_date" value="{{ isset($editData) ? $editData->joining_date : old('joining_date') }}" class="form-control datetimepicker-input" data-target="#date" />
                                                    <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">Photo</label>
                                                <input type="file" class="form-control" name="photo" id="photo" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="card-body">
                                            <h4>Additional Information</h4>

                                            <div class="form-group">
                                                <label for="father_name">Father Name</label>
                                                <input type="text" class="form-control" name="father_name" id="father_name" value="{{ isset($editData) ? $editData->father_name : old('father_name') }}" placeholder="Enter father name">
                                            </div>
                                            <div class="form-group">
                                                <label for="mother_name">Mother Name</label>
                                                <input type="text" class="form-control" name="mother_name" id="mother_name" value="{{ isset($editData) ? $editData->mother_name : old('mother_name') }}" placeholder="Enter mother name">
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile">Mobile No.</label>
                                                <input type="number" class="form-control" name="mobile" id="mobile" value="{{ isset($editData) ? $editData->mobile : old('mobile') }}" placeholder="Enter mobile number">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" value="{{ isset($editData) ? $editData->email : old('email') }}" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name">Date Of Borth</label>
                                                <div class="input-group date2" id="date2" data-target-input="nearest">
                                                    <input type="text" name="dob" value="{{ isset($editData) ? $editData->dob : old('dob') }}" class="form-control datetimepicker-input" data-target="#date2" />
                                                    <div class="input-group-append" data-target="#date2" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="state_id">State</label>
                                                <select class="form-control" name="state_id" id="state_id">
                                                    <option value="">-- Select State --</option>
                                                    @foreach($states as $state)
                                                    <option value="{{ $state->id }}" @if($key==$empTypeId) selected @endif>{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="city_id">City</label>
                                                <select class="form-control" name="city_id" id="city_id">
                                                    <option value="">-- Select City --</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="caddress">Correspondence Address</label>
                                                <input type="text" class="form-control" name="caddress" id="caddress" value="{{ isset($editData) ? $editData->caddress : old('caddress') }}" placeholder="Enter correspondence apddress">
                                            </div>
                                            <div class="form-group">
                                                <label for="paddress">Permanent Address</label>
                                                <input type="text" class="form-control" name="paddress" id="paddress" value="{{ isset($editData) ? $editData->paddress : old('paddress') }}" placeholder="Enter permanent address">
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
                                    </div>
                                </div>
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                                </div>
                                <!-- /.card-body -->
                                <!-- <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
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
<script>
    $(document).ready(function() {

        $('#department_id').on('change', function() {
            var departmentId = $(this).val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            if (departmentId) {
                $.ajax({
                    url: "{{ route('employee.getDesignation') }}",
                    type: 'POST',
                    data: {
                        department_id: departmentId,
                        _token: csrfToken
                    },
                    success: function(response) {
                        var htmlData = '<option value="">-- Select Designation --</option>';
                        response.forEach(rec => {
                            htmlData += '<option value="' + rec.id + '">' + rec.name + '</option>';
                        });

                        $('#designation_id').html(htmlData);
                    }
                });
            } else {
                $('#designation').text('');
            }
        });

        $('#state_id').on('change', function() {
            var stateId = $(this).val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            if (stateId) {
                $.ajax({
                    url: "{{ route('employee.getCity') }}",
                    type: 'POST',
                    data: {
                        state_id: stateId,
                        _token: csrfToken
                    },
                    success: function(response) {
                        var htmlData = '<option value="">-- Select City --</option>';
                        response.forEach(rec => {
                            htmlData += '<option value="' + rec.id + '">' + rec.name + '</option>';
                        });

                        $('#city_id').html(htmlData);
                    }
                });
            } else {
                $('#designation').text('');
            }
        });
    });
</script>
@endsection