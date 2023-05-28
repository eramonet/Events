<?php

namespace App\Helper;


class AdminPermission
{
public static function all() {


        $permission = [

            "system-admins"=>['read','create','update','delete'],
            "vendor-admins"=>['read','create','update','delete'],
            "admin-categories"=>['read','create','update','delete'],
            "vendors"=>['read','create','update','delete'],
            "users"=>['read','create','update','delete'],
            "home-slider"=>['read','create','update','delete'],
            "settings"=>['read','update'],
            "halls"=>['read','create','update','delete'],
            "halls-categories"=>['read','create','update','delete'],
            "packages"=>['read','create','update','delete'],
            "packages-options-categories"=>['read','create','update','delete'],
            "packages-options"=>['read','create','update','delete'],
            "packages-available-dates-and-times"=>['read','create','update','delete'],
            "bookings"=>['read','create','update','delete'],
            "products-categories"=>['read','create','update','delete'],
            "products"=>['read','create','update','delete'],
            "products-reviews"=>['read','create','update','delete'],
            "orders"=>['read','update','delete'],
            "taxes"=>['read','create','update','delete'],
            "promo-codes"=>['read','create','update','delete'],
            "shippings"=>['read','create','update','delete'],
            "ads-categories"=>['read','create','update','delete'],
            "ads"=>['read','create','update','delete'],
            "countries"=>['read','create','update','delete'],
            "cities"=>['read','create','update','delete'],
            "regions"=>['read','create','update','delete'],
            "contacts"=>['read','create','update','delete'],
            "pages"=>['read','create','update','delete'],
            "reports"=>['read'],
            "notifications" => ['read', 'create', 'delete'],
            "occasion" => ['read', 'create', 'delete'],
            "hall_request" => ['read', 'create', 'delete'],
            "product_request" => ['read', 'create', 'delete'],
            "area" => ['read'],
            'occasion' => ['read','create','update','delete'],
            'my-advertisements'=>['read'], 
            'with-darw' => ['read','create','update','delete'],
            


        ];

        return $permission;

}

public static function vendor() {


    $permission = [

        
        // "vendor-data"=>['read','create','update','delete'],
        
     
        "halls"=>['read','create','update','delete'],
        "halls-categories"=>['read','create','update','delete'],
        "packages"=>['read','create','update','delete'],
        "packages-options-categories"=>['read','create','update','delete'],
        "packages-options"=>['read','create','update','delete'],
        "packages-available-dates-and-times"=>['read','create','update','delete'],
        "bookings"=>['read','create','update','delete'],
        "products-categories"=>['read','create','update','delete'],
        "products"=>['read','create','update','delete'],
        "products-reviews"=>['read','create','update','delete'],
        "orders"=>['read','update','delete'],
        "taxes"=>['read','create','update','delete'],
        "promo-codes"=>['read','create','update','delete'],
        "shippings"=>['read','create','update','delete'],
        "ads-categories"=>['read','create','update','delete'],
        "countries"=>['read','create','update','delete'],
        "cities"=>['read','create','update','delete'],
        "regions"=>['read','create','update','delete'],
        "contacts"=>['read','create','update','delete'],
        "pages"=>['read','create','update','delete'],
        "reports"=>['read'],
        "notifications" => ['read', 'create', 'delete'],
        "area" => ['read'],
        'colors' => ['read', 'create', 'delete'],
        'sizes' => ['read', 'create', 'delete'],
        'shipping'  => ['read', 'create', 'delete'],
        'digital_cart'  => ['read', 'create', 'delete'],
        'become_vendor' => ['read', 'create', 'delete'],
        "vendor-admins"=>['read','create','update','delete'],

      
        'my-advertisements'=>['read'],  
        'with-darw' => ['read'],
        
    ];

    return $permission;

}



}