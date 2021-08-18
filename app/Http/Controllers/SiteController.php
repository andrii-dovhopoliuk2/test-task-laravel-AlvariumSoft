<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    /**
     * @param false $count
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setItemsOnPage($count = 10)
    {
        session()->put('items_on_page', intval($count));
        return redirect()->back();
    }
}
