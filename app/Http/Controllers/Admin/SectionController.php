<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(Cache::store('redis')->get('myname'));
        $sections = Section::get();
        return view('Section/index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Section/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataArr = [
            'name' => $request['name']
        ];
        Section::create($dataArr);
        return redirect()->route('section')->with('success','Record save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editData = Section::find($id);
        return view('Section/add', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $class = Section::find($id);
        $class->name = $request['name'];
        $class->status = $request['status'];
        $class->save();
        return redirect('section')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $session = Section::find($id);
        $session->delete();
        return redirect('section')->with('error', 'Class deleted successfully.');
    }
}
