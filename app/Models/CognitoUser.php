<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CognitoUser extends Model
{
    protected $table = 'cognito_users';
    protected $fillable = ['name', 'last_name', 'email', 'kendo_user', 'password', 'sub'];
}
