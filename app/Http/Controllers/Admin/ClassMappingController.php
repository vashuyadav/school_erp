<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\ClassMapping;
use App\Models\Section;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;

class ClassMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = ClassMapping::query();
        $query->with([
            'classes:id,name','sections:id,name'
        ]);
        $records = $query->get();
        return view('Classes/class_mapping_index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        $sections = Section::all();
        return view('Classes/class_mapping_add', compact('classes','sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataArr = [
            'class_id' => $request['class_id'],
            'section_id' => $request['section_id'],
            'employee_id' => $request['employee_id']
        ];
        ClassMapping::create($dataArr);
        return redirect('class_mapping')->with('success','Record save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassMapping $classMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editData = ClassMapping::find($id);
        $classes = Classes::all();
        $sections = Section::all();
        return view('Classes/class_mapping_add', compact('editData','classes','sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mapping = ClassMapping::find($id);
        $mapping->class_id = $request['class_id'];
        $mapping->section_id = $request['section_id'];
        $mapping->employee_id = $request['employee_id'];
        $mapping->status = $request['status'];
        $mapping->save();
        return redirect('class_mapping')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mapping = ClassMapping::find($id);
        // $mapping->delete();
        return redirect('class_mapping')->with('error', 'Record deleted successfully.');
    }
}
