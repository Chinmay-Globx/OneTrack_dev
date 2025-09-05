<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use App\Models\UserProfile;
use App\Models\UserType;

class UserController extends Controller
{
    /**
     * Add new user (registration by admin)
     */
    public function addUser(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:8',
            'user_type'    => 'required|exists:master_user_type,id',

            'first_name'   => 'required|string|max:100',
            'last_name'    => 'nullable|string|max:100',
            'mobile_number'=> 'required|string|max:15',
            'department'   => 'required|exists:master_department,id',
            'designation'  => 'required|exists:master_designation,id',
            'employee_id'  => 'required|string|max:50|unique:user_profiles,employee_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Create user
        $user = Users::create([
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'user_type' => $request->user_type,
            'first_login' => true,
        ]);

        // Create user profile
        $profile = UserProfile::create([
            'user_id'      => $user->id,
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'mobile_number'=> $request->mobile_number,
            'department'   => $request->department,
            'designation'  => $request->designation,
            'employee_id'  => $request->employee_id,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'User registered successfully',
            'data'    => [
                'user'    => $user,
                'profile' => $profile
            ]
        ], 201);
    }
}
