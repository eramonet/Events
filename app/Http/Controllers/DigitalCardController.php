<?php

namespace App\Http\Controllers;

use App\Models\DigitalCard;
use Illuminate\Http\Request;

class DigitalCardController extends Controller
{
    public function index()
    {
        $digital_cart = DigitalCard::get() ;

        return view("admin.digital_cards.index" , compact('digital_cart'));
    }
}
