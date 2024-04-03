<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'full_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required|numeric|regex:/^0[0-9]{8,12}$/',
            'graduate_year' => 'nullable|regex:/^[0-9]{4,4}$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'repeat_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;

        return response()->json($success, 201);
    }
}
