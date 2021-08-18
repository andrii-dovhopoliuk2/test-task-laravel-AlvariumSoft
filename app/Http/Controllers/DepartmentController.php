<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employe;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importXml(Request $request)
    {
        $request->validate(
            [
                'department' => 'file|mimes:xml',
            ]
        );
        if ($request->hasFile('department')) {
            $file = $request->file('department');
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
                $department = new Department();
                $department->name = $item->name;
                $department->save();
            }
        } catch (\Exception $exception) {
            report($exception);
        }
    }

}
