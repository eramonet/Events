<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,


    'truncate_tables' => true,

    'roles_structure' => [
        'super-admin' => [
            'users' => 'c,r,u,d',
            'system-admins' => 'c,r,u,d',
            'vendor-admins' => 'c,r,u,d',
            'admin-categories' => 'c,r,u,d',
            'vendors' => 'c,r,u,d',
            'halls' => 'c,r,u,d',
            'halls-categories' => 'c,r,u,d',
            'packages' => 'c,r,u,d',
            'packages-options-categories' => 'c,r,u,d',
            'packages-options' => 'c,r,u,d',
            'packages-available-dates-and-times' => 'c,r,u,d',
            'bookings' => 'c,r,u,d',
            'products-categories' => 'c,r,u,d',
            'products' => 'c,r,u,d',
            'products-reviews' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'taxes' => 'c,r,u,d',
            'promo-codes' => 'c,r,u,d',
            'shippings' => 'c,r,u,d',
            'ads-categories' => 'c,r,u,d',
            'ads' => 'c,r,u,d',
            'home-slider' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
            'regions' => 'c,r,u,d',
            'contacts' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'reports' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
            'area' => 'r',

            'colors' => 'c,r,u,d',
            'sizes' => 'c,r,u,d',
            'shipping'  => 'c,r,u,d',

            'digital_cart'  => 'c,r,u,d',
            'become_vendor' => 'c,r,u,d',
            'hall_request' => 'c,r,u,d',
            'product_request' => 'c,r,u,d',
            'occasion' => 'c,r,u,d',
           
            'with-darw' => 'c,r,u,d',
            'my-advertisements'=>'r',

            


        ],
        'admin' => [

        ],
        'vendor-admin' => [
           
        ],




    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
