<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;

class Home extends BackEndController
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function dashboard(){
        $pageTitle = 'Dashboard';
        return view('back-end.dashboard.index' , compact('pageTitle'));
    }  
	
}
