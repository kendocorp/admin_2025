<?php

namespace App\Http\Controllers;

use App\Models\CognitoUser;
use Illuminate\Http\Request;

class CognitoUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cognito_users = CognitoUser::all();
        return view('cognito_users.index', compact('cognito_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cognito_users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:cognito_users,email',
            'kendo_user' => 'required|string|max:255|unique:cognito_users,kendo_user',
            'password' => 'required|string|min:6',
            'sub' => 'nullable|string|max:255',
        ]);

        try {
            CognitoUser::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'kendo_user' => $request->kendo_user,
                'password' => $request->password,
                'sub' => $request->sub,
            ]);

            return redirect()->route('cognito_users.index')
                           ->with('success', 'Cognito user created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Failed to create cognito user: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CognitoUser $cognitoUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CognitoUser $cognitoUser)
    {
        return view('cognito_users.edit', compact('cognitoUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CognitoUser $cognitoUser)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:cognito_users,email,' . $cognitoUser->id,
            'kendo_user' => 'required|string|max:255|unique:cognito_users,kendo_user,' . $cognitoUser->id,
            'password' => 'required|string|min:6',
            'sub' => 'nullable|string|max:255',
        ]);

        try {
            $cognitoUser->update([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'kendo_user' => $request->kendo_user,
                'password' => $request->password,
                'sub' => $request->sub,
            ]);

            return redirect()->route('cognito_users.index')
                           ->with('success', 'Cognito user updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                           ->withInput()
                           ->with('error', 'Failed to update cognito user: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CognitoUser $cognitoUser)
    {
        try {
            $cognitoUser->delete();
            
            return redirect()->route('cognito_users.index')
                           ->with('success', 'Cognito user deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('cognito_users.index')
                           ->with('error', 'Failed to delete cognito user: ' . $e->getMessage());
        }
    }
}
