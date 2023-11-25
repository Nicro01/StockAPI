<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        return Department::all();
    }

    public function show($id)
    {
        return Department::find($id);
    }

    public function store(Request $request)
    {
        return Department::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->update($request->all());
        return $department;
    }

    public function destroy($id)
    {
        return Department::destroy($id);
    }
}
