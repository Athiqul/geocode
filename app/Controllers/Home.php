<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $div=new \App\Models\Divisions();
        $data=$div->findAll();
        //dd($data);
        return view('welcome_message');
    }

    //
    public function addCity()
    {
             return view('Add/thana');
    }

    public function addWard()
    {
         return view('Add/union-ward');
    }

    public function allList()
    {
          return view('geolist/index');
    }

   
}
