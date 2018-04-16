<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class DefaultComposer
{

    public function __construct()
    {
        //
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $preventCache = file_get_contents(resource_path().'/assets/prevent-cache.txt');
        $view->with('preventCache',  $preventCache);
    }

}






