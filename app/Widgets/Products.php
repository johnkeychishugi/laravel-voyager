<?php

namespace App\Widgets;

use App\Models\Product;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Products extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Product::count();

        $string = 'Product';

        return view('voyager::dimmer', array_merge($this->config,[
            'icon' => 'voyager-bag',
            'title' => "{$count} {$string}",
            'text' => "You have $count product in your database. Click on button below to view all product.",
            'button' =>[
                'text' => 'View all products',
                'link' => route('voyager.products.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg')
        ]));
    }

     /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        $count = Product::count();
        return $count;
    }
}
