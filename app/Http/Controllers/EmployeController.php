<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
use Illuminate\Http\Request;


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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importXml(Request $request)
    {
        $request->validate(
            [
                'employes' => 'file|mimes:xml',
            ]
        );
        if ($request->hasFile('employes')) {
            $file = $request->file('employes');
        }
        $this->saveFromXml($file);

        return redirect()->back();
    }

    /**
     * @param $file
     */
    private function saveFromXml($file)
    {
        try {
            $xml = simplexml_load_file($file, null, true);
            foreach ($xml->Item as $item) {
                $employe = new Employe();
                $employe->full_name = $item->name;
                $employe->birthday = $item->birthday;
                $employe->department_id = $item->department_id;
                $employe->position = $item->position;
                $employe->type = $item->type;
                switch ($employe->type) {
                    case Employe::TYPE_PAYMENT_MONTHLY:
                        $employe->monthly_payment = $item->monthly_payment;
                        break;
                    case Employe::TYPE_PAYMENT_HOURLY:
                        echo $employe->monthly_payment = $item->count_hour * $item->hourly_payment;
                        break;
                }
                $employe->save();
            }
        } catch (\Exception $exception) {
            report($exception);
        }
    }

}
