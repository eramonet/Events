<?php

namespace App\Http\Interfaces;

interface UserRepositoryInterface
{
    public function home($lang);

    public function eventsCategories($lang);

    public function eventHalls($lang, $category_id);

    public function latestWedingsHalls($lang);

    public function latestBirthdaysHalls($lang);

    public function latestEngagementsHalls($lang);

    public function latestConferencesHalls($lang);

    public function getProducts($lang);

    public function addFavorite($request);

    public function getFavoriteList($user_id, $lang);

    public function getBrandProducts($lang, $brand_id);

    public function getCategoryProducts($lang, $category_id);

    public function getProduct($lang, $product_id);

    public function getPackage($lang, $package_id);

    public function getHall($lang, $hall_id);

    public function search($request,$lang);

    public function createHallsCart($request);

    public function getHallsCart($user, $lang);

    public function checkoutHall($request);

    public function filter($request,$lang);

    public function rateBooking($request);

    public function rateOrder($request);

    public function checkDate($request);

    public function orderProductCart($request);

    public function getProductsCart($user, $lang);

    public function checkoutProduct($request);

    public function myOrders($user, $lang);

    public function orderDetails($user,$order_id,$lang);
}