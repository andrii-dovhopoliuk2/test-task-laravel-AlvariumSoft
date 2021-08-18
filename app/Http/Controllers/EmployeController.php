<?php

namespace App\Http\Controllers;

use App\Models\Employe;


class EmployeController extends Controller
{
    /**
     * @param false $department
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($department_id = false)
    {
        if ($department_id) {
            $employes = Employe::where('department_id', $department_id)->with('department');
        } else {
            $employes = Employe::with('department');
        }
        $employes = $employes->paginate(session()->get('items_on_page', 10));

        return view('employe.index', compact('employes'));
    }
}
