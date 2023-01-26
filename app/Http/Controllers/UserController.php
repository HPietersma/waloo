<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUser(Request $request) {
        
        $user =  Auth::user();
        $role = Roles::where('id', $user->roles_id)->get('role_name');
        return [
            'forename'=>$user->forename,
            'surname'=>$user->surname,
            'email'=>$user->email,
            'companies_id'=>$user->companies_id,
            'role'=>$role[0]->role_name,
        ];
    }

    public function getEmployees(Request $request) {
        $company_id = $request->user()->company_id;

        $employees = User::where('company_id', $company_id)->get();

        return $employees;
    }
}
