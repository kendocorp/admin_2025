<?php

namespace App\Http\Controllers;

use App\Models\CognitoUserBatch;
use Illuminate\Http\Request;

class CognitoUserBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cognito_user_batches.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $cognitoUserBatch)
    {
        return view('cognito_user_batches.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CognitoUserBatch $cognitoUserBatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CognitoUserBatch $cognitoUserBatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CognitoUserBatch $cognitoUserBatch)
    {
        //
    }
}
