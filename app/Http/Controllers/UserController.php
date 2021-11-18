<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // api response
        try {
            $users = DB::table('users')->get();
            return response()->json([
                'status' => 'success',
                'message' => 'Users data fetched succesfully',
                'data' => $users,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => $e->getMessage(),
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            // create new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if ($user) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'User created succesfully',
                    'data' => $user,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not created',
                    'data' => $user,
                ], 500);
            }
        } catch (\Exception $e) {

            // return error response
            return response()->json(
                [
                    "status" => 'error',
                    "message" => $e->getMessage(),
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $user = User::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'message' => 'User data fetched succesfully',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => 'User not found',
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'User updated succesfully',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => 'User not found',
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted succesfully',
                'data' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    "status" => 'error',
                    "message" => 'User not found',
                    "error_code" => $e->getCode(),
                    "errors" => $e
                ],
                500
            );
        }
    }
}
