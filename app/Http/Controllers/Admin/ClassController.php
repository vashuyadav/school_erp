<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $classes = Classes::withTrashed()->get();
        $classes = Classes::withTrashed()->get();
        return view('classes/index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataArr = [
            'name' => $request['name']
        ];
        Classes::create($dataArr);
        return redirect()->route('classes.index')->with('success','Record save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classData = Classes::find($id);
        return view('Classes/add', compact('classData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // observer is working on this method of update
        $class = Classes::find($id);
        $class->name = $request['name'];
        $class->status = $request['status'];
        $class->save();
        
        // observer is not working on this method of update
        // $dataArr = [
        //     'name' => $request['name'],
        //     'status' => $request['status']
        // ];
        // Classes::where('id',$id)->update($dataArr);

        // // DB::enableQueryLog();
        // dd(DB::getQueryLog());
        
        // return redirect('classes')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $session = Classes::findOrFail($id);
        $session->delete();
        return redirect()->route('classes.index')->with('error', 'Class deleted successfully.');
    }

    public function restore($id)
    {
        $class = Classes::withTrashed()->find($id);
        if ($class) {
            $class->restore();
            return redirect()->route('classes.index')->with('success', 'Class restored successfully.');
        }
        return redirect()->route('classes.index')->with('error', 'Class not found.');
    }
}
