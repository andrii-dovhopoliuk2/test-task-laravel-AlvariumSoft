<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    /**
     * @param false $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($department = false)
    {
        if ($department) {
            $employes = Employe::where('department_id', $department)->with('department');
        } else {
            $employes = Employe::with('department');
        }
        $employes = $employes->paginate(10);
        return view('employe.index', compact('employes'));
    }
}
