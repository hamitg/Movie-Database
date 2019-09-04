<?php

namespace App\Http\ViewComposers;
use App\Site;
use Illuminate\View\View;


use Illuminate\Database\Eloquent\Model;

class SiteComposer
{
    public $siteData;
    public function compose(View $view) {
        $site = Site::find(1);
        $view->with('siteData', $site);
    }
}
