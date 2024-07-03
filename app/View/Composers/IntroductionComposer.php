<?php
 
namespace App\View\Composers;
 
use App\Models\Introduction;
use Illuminate\View\View;
 
class IntroductionComposer
{
    protected  $introduction;

    public function __construct() 
    {

    }

    public function compose(View $view)
    {
        $introduction = Introduction:: select('id', 'title', 'description') -> where('active_region_id', 1)->orderByDesc('id')->get;
        $view->with('intrductions', $introduction);
    }
}