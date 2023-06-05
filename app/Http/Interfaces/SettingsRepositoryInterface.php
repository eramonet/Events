<?php

namespace App\Http\Interfaces;

interface SettingsRepositoryInterface
{
    public function getCities($lang);

    public function getRegions($city_id);

    public function getTerms($lang);

    public function getAbout($lang);

    public function getFaqs($lang);

    public function getColors($lang);

    public function getBrands($lang);

    public function insertContactForm($request);

    public function insertContactFormWithoutToken($request);

    public function getCategories($lang);

    public function getNotifications($user);

    public function becomeVendor($request);

}