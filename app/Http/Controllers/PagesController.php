<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSupplier;

class PagesController extends Controller
{
    /**
     * Display an application first view page
     *
     * @return \Illuminate\Http\Response
     */

	public function index()
	{
		return view('auth/login');
	}

	public function categories()
	{
		return view('pages.category.index');
	}

}
