<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome to Laravel Test App!';
        return view('pages.index')->with('title', $title);
    }
    public function about()
    {
        $title = 'About Laravel Test App!';
        return view('pages.about', compact('title'));
    }
    public function services()
    {
        $data = array(
            'title' => 'Services of Laravel Test App!',
            'services' => ['Web Development', 'Web Design', 'Mobile App', 'Programming']
        );
        return view('pages.services')->with($data);
    }
}
