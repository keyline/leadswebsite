<?php

namespace App\Controllers;

class Location extends BaseController
{
    public function kolkata()
    {
        return view('location/kolkata');
    }
    public function guwahati()
    {
        return view('location/guwahati');
    }
    public function bhubaneswar()
    {
        return view('location/bhubaneswar');
    }
    public function siliguri()
    {
        return view('location/siliguri');
    }
    public function bilaspur()
    {
        return view('location/bilaspur');
    }
    public function agartala()
    {
        return view('location/agartala');
    }
    public function patna()
    {
        return view('location/patna');
    }
}
