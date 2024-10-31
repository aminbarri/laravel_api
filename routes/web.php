<?php



use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;use Illuminate\Foundation\Auth\User as Authenticatable;

/*
 
"admin": "4|C4HwtGhYCoSBvzOuV6uGYckGYECTPwMJCfXtl4Ej297e8137",
"update": "5|xx7T1WqnRHOTQJBPBfWa7DZngzJSQvcJzhWJi6HA18f56fcf",
"basic": "6|gfF5WPVrtfbxAlG1OKY05Rnt5vsroBAgT3R3BhmN2f882389"

 */

Route::get('/', function () {
    return view('welcome');
});




Route::get('setup', function () {
    $credentials = [
        'email' => 'admin@admssin.com',
        'password' => 'password'
    ];

    // Check if the user exists and log them in
    if (!Auth::attempt($credentials)) {
        $user = new \App\Models\User();
        $user->name = 'Admin';
        $user->email = $credentials['email'];
        $user->password = Hash::make($credentials['password']);
        $user->save();

        // Attempt login again after creating the user
        Auth::attempt($credentials);
    }

    // Fetch the authenticated user and generate tokens
    $user = Auth::user();
    $adminToken = $user->createToken('admin-token', ['create', 'update', 'delete'])->plainTextToken;
    $updateToken = $user->createToken('update-token', ['update', 'create'])->plainTextToken;
    $basicToken = $user->createToken('basic-token',['read'])->plainTextToken;

    // Return tokens as JSON response
    return response()->json([
        'admin' => $adminToken,
        'update' => $updateToken,
        'basic' => $basicToken,
    ]);
});



