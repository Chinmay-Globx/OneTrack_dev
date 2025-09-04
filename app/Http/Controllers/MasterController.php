<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\UserType;

class MasterController extends Controller
{
    public function departments()
    {
        return response()->json(Department::all());
    }

    public function designations()
    {
        return response()->json(Designation::all());
    }

    public function userTypes()
    {
        return response()->json(UserType::all());
    }
}
