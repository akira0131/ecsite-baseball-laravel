<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AssetComposer
{
    /**
     * name
     *
     * @return void
     */
    public function compose(View $view)
    {
        
            $view->with([
                'asset_css' => 'admin.css',
                'app_css'   => 'app.css',
            ]);
    }
}