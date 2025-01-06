<?php
namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProfileUserController extends Controller
{


    public function profile()
    {
        // Check if the user is authenticated
        $user = Auth::user();
    
        if (!$user) {
            // Return a 401 Unauthorized response if the user is not authenticated
            return response()->json([
                'message' => 'Unauthenticated',
            ], 401);
        }
    
        // Find the user in the database to ensure they exist
        $user = User::find($user->id);
    
        if (!$user) {
            // Return a 404 Not Found response if the user does not exist in the database
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }
    
        // Generate a Sanctum personal access token
        $token = $user->createToken('access_token')->plainTextToken;
    
        // Return the token and user details in the response
        return response()->json([
            'token' => 'Bearer ' . $token,
            'user' => $user,
        ]);
    }
    
}
