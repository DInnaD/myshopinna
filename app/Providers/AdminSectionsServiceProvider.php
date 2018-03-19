<?php

namespace App\Providers;

use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{


    /**
     * @var array
     */
    protected $sections = [
        \App\Brand::class => 'App\Http\Sections\Brands',
        \App\Category::class => 'App\Http\Sections\Categories',
        \App\Comment::class => 'App\Http\Sections\Comments',
        'App\Currency' => 'App\Http\Sections\Currencies',
        'App\Gallery' => 'App\Http\Sections\Galleries',
        'App\Order' => 'App\Http\Sections\Orders',
        'App\OrderProduct' => 'App\Http\Sections\OrdersProducts',
        'App\Product' => 'App\Http\Sections\Products',
        //'App\RelatedProduct' => 'App\Http\Sections\RelatedsProducts',
        'App\Subscription' => 'App\Http\Sections\Subscriptions',
        'App\Tag' => 'App\Http\Sections\Tags',
        'App\User' => 'App\Http\Sections\Users',
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//

        parent::boot($admin);
    }
}
