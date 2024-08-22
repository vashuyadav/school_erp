<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ClassSession;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $classSessions = ClassSession::get(); 
        // $classSessions = ClassSession::onlyTrashed()->get();
        $classSessions = ClassSession::withTrashed()->get();
        return view('Session/index', compact('classSessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Session/add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataArr = [
            'name' => $request['name'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        ClassSession::create($dataArr);
        return redirect('session')->with('success','Record save successfully');
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
        $classSession = ClassSession::find($id);
        return view('Session/add', compact('classSession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $session = ClassSession::find($id);
        $dataArr = [
            'name' => $request['name'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
        ];
        $session->update($dataArr);
        return redirect('session')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $session = ClassSession::findOrFail($id);
        $session->delete();
        return redirect('session')->with('success','Record deleted successfully');
    }

    public function restore($id)
    {
        $model = ClassSession::onlyTrashed()->findOrFail($id);
        $model->restore();
        return redirect('session')->with('success','Record restored successfully');
    }
}
