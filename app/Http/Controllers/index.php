<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class index extends Controller
{
    public function index()
    {
        $home = DB::select('select * from content_home')[0];
        $profiles = DB::select('select * from company_profile')[0];
        $solution = DB::select('select * from content_solution');
        $features = DB::select('select * from content_features');
        $analytics = DB::select('select * from content_analytics');
        $partners = DB::select('select * from content_partners');



        return view('index', compact('home', 'solution', 'features', 'partners', 'profiles', 'analytics'));
    }

    public function postContact(Request $request)
    {
        $post = DB::insert("
            insert into request(name,email,subject,message,created_at,updated_at)
            values('" . $request->get('name') . "', '" . $request->get('email') . "', '" . $request->get('subject') . "', '" . $request->get('message') . "',now(),now());
        ");
        return redirect('/');
    }
}
