<?php
namespace App\Http\Controllers\Admin;

use App\Events\EmployeeCreated;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Religion;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // how to use redis
        // Cache::store('redis')->put('myname', 'VASHU YADAV', 120); // Store for 2 minutes
        // $value = Cache::store('redis')->get('myname');
        // dd($value);

        $employees = Employee::get();
        $departments = Department::all('id','name');
        return view('Employee/index', compact('employees','departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::where('status', ACTIVE)->get(['id','name']);
        $religions = Religion::where('status', ACTIVE)->get(['id','name']);
        $categorys = Category::where('status', ACTIVE)->get(['id', 'name']);
        $states = State::where('status', ACTIVE)->get(['id', 'name']);
        
        // Call listener here
        // $data = ['user_id'=>123, 'mobile'=>'9651728397'];
        // event(new EmployeeCreated($data));

        return view('Employee/add', compact('departments','religions','categorys','states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $dataArr = [
            'emp_code' => 123,
            'emp_type' => $request['emp_type'],
            'department_id' => $request['department_id'],
            'designation_id' => $request['designation_id'],
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'gender' => $request['gender'],
            'religion_id' => $request['religion_id'],
            'category_id' => $request['category_id'],
            'joining_date' => $request['joining_date'],
            'father_name' => $request['father_name'],
            'mother_name' => $request['mother_name'],
            'mobile' => $request['mobile'],
            'email' => $request['email'],
            'dob' => $request['dob'],
            'state' => $request['state_id'],
            'city' => $request['city_id'],
            'caddress' => $request['caddress'],
            'paddress' => $request['paddress'],
        ];
        Employee::create($dataArr);dd($request);
        return redirect('employee')->with('success','Record save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editData = Employee::find($id);
        $departments = Department::where('status', ACTIVE)->get(['id','name']);
        $religions = Religion::where('status', ACTIVE)->get(['id','name']);
        $categorys = Category::where('status', ACTIVE)->get(['id', 'name']);
        $states = State::where('status', ACTIVE)->get(['id', 'name']);
        return view('Employee/add', compact('editData','departments','religions','categorys','states'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $class = Employee::find($id);
        $class->name = $request['name'];
        $class->status = $request['status'];
        $class->save();
        return redirect('employee')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $session = Employee::find($id);
        $session->delete();
        return redirect('employee')->with('error', 'Class deleted successfully.');
    }

    public function getDesignation(Request $request)
    {
        $deptId = $request['department_id'];
        $designatons = Designation::where('department_id', $deptId)->get();
        
        return $designatons;
    }

    public function getCity(Request $request)
    {
        $stateId = $request['state_id'];
        $citis = City::where('state_id', $stateId)->get();
        
        return $citis;
    }
}
