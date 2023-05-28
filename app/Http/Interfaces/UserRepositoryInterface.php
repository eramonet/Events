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

}