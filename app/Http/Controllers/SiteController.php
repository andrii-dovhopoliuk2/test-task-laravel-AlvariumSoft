<?php

namespace App\Http\Controllers;

use App\Models\Site;

class SiteController extends Controller
{
    /**
     * @param false $count
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setItemsOnPage($count = 10)
    {
        if (in_array($count, Site::getItemsOnPage())) {
            session()->put('items_on_page', intval($count));
        }
        return redirect()->back();
    }
}
