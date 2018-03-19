<?php

use SleepingOwl\Admin\Navigation\Page;


return [
    [
        'title' => 'Dashboard',
        'icon'  => 'fa fa-dashboard',
        'url'   => route('admin.dashboard'),
    ],

    [
        'title' => "Main",
        'icon' => 'fa fa-credit-card',
        'priority' =>'1000',
        'pages' => [
            
            (new Page(\App\Brand::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),


            (new Page(\App\Category::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

            (new Page(\App\Comment::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

            (new Page(\App\Currency::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

            (new Page(\App\Gallery::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

            (new Page(\App\Subscription::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

            (new Page(\App\Tag::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

        ],
    ],
    [
        'title' => "Cart",
        'icon' => 'fa fa-credit-card',
        'priority' =>'1000',
        'pages' => [
            (new Page(\App\Order::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

            (new Page(\App\OrderProduct::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

            (new Page(\App\Product::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),

//            (new Page(\App\RelatedProduct::class))
//                ->setIcon('fa fa-fax')
//                ->setPriority(100),

            (new Page(\App\User::class))
                ->setIcon('fa fa-fax')
                ->setPriority(100),
        ],
    ],


    ];