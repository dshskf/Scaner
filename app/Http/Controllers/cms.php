<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Image;

class cms extends Controller
{
   
    public function compressAndConvertImage($file)
    {
        $img = Image::make($file->path());
        $token = random_bytes(8);
        $token = bin2hex($token);

        $image_name = 'images/' . $token . "-" . $file->getClientOriginalName();

        $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
        })->save($image_name);

        return $image_name;
    }

    public function dashboard()
    {
        return view('cms/dashboard');
    }

    public function getProfile()
    {
        $profile = DB::select('select * from company_profile limit 1')[0];
        return view('cms/profile', compact('profile'));
    }

    public function postProfile(Request $request)
    {
        $post = DB::insert("
            update company_profile set
            address='" . $request->get('address') . "', email='" . $request->get('email') . "',
            phone='" . $request->get('phone') . "', map_link='" . $request->get('map') . "'
            where id=1 
        ");

        return redirect('cms-profile');
    }

    public function getRequest()
    {
        $request = DB::select('select * from request');
        return view('cms/request', compact('request'));
    }
    public function postRequest()
    {
    }

    public function getHome()
    {
        $home = DB::select('select * from content_home limit 1')[0];
        return view('cms/home', compact('home'));
    }

    public function postHome(Request $request)
    {
        $image_name = '';
        if ($file = $request->file('image')) {
            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $image_name = 'images/' . $name;
        }

        $post = DB::update("
            update content_home set
            title='" . $request->get('title') . "', description='" . $request->get('description') . "',
            button='" . $request->get('button') . "', image='" . $image_name . "'
            where id=1 
        ");

        return redirect('cms-home');
    }


    public function getQuery($table)
    {
        return DB::select("select * from " . $table);
    }

    public function deleteQuery($table, $id)
    {
        return DB::delete("delete from " . $table . " where id=" . $id);
    }


    public function getSolutions()
    {
        $solution = $this->getQuery("content_solution");
        return view('cms/solutions', compact('solution'));
    }

    public function updateSolutions(Request $request)
    {
        if ($request->get('action') === "Delete") {
            $this->deleteQuery("content_solution", $request->get('id'));
        } else {
            $post = DB::insert("
            update content_solution set
            category='" . $request->get('category') . "', description='" . $request->get('description') . "',
            icon='" . $request->get('icon') . "'
            where id=" . $request->get('id'));
        }

        return redirect('cms-solutions');
    }

    public function addSolutions(Request $request)
    {
        $post = DB::insert("
            insert into content_solution (category,description,icon)
            values('" . $request->get('category') . "', '" . $request->get('description') . "',
            '" . $request->get('icon') . "')
        ");


        return redirect('cms-solutions');
    }


    public function getAnalytics()
    {
        $analytics = $this->getQuery("content_analytics");
        return view('cms/analytics', compact('analytics'));
    }

    public function updateAnalytics(Request $request)
    {
        if ($request->get('action') === "Delete") {
            $this->deleteQuery('content_analytics', $request->get('id'));
        } else {
            $image_name = '';
            if ($file = $request->file('image')) {
                $image_name = $this->compressAndConvertImage($file);
            } else {
                $image_name = $request->get('last_image');
            }

            $post = DB::update("
                update content_analytics set
                title='" . $request->get('title') . "', image='" . $image_name . "'
                where id=" . $request->get('id'));
        }

        return redirect('cms-analytics');
    }

    public function addAnalytics(Request $request)
    {
        if ($file = $request->file('image')) {
            $image_name = $this->compressAndConvertImage($file);
            $post = DB::insert("
                insert into content_analytics (title,image)
                values('" . $request->get('title') . "', '" . $image_name . "')
            ");
        }

        return redirect('cms-analytics');
    }


    public function getPartners()
    {
        $partners = DB::select("select * from content_partners");
        return view("/cms/partners", compact('partners'));
    }

    public function updatePartners(Request $request)
    {
        if ($request->get('action') === "Delete") {
            $this->deleteQuery('content_partners', $request->get('id'));
        } else {
            $image_name = '';

            if ($file = $request->file('image')) {
                $image_name = $this->compressAndConvertImage($file);
            } else {
                $image_name = $request->get('last_icon');
            }

            $post = DB::update("
                update content_partners set
                company='" . $request->get('company') . "', icon='" . $image_name . "'
                where id=" . $request->get('id'));
        }

        return redirect('cms-partners');
    }

    public function addPartners(Request $request)
    {
        if ($file = $request->file('image')) {
            $image_name = $this->compressAndConvertImage($file);
            $post = DB::insert("
                insert into content_partners (company,icon)
                values('" . $request->get('company') . "', '" . $image_name . "')
            ");
        }

        return redirect('cms-partners');
    }

    public function getFeatures()
    {
        $features = DB::select("select * from content_features");
        return view("/cms/features", compact('features'));
    }

    public function updateFeatures(Request $request)
    {
        if ($request->get('action') === "Delete") {
            $this->deleteQuery('content_features', $request->get('id'));
        } else {
            $image_name = '';
            if ($file = $request->file('image')) {
                $image_name = $this->compressAndConvertImage($file);
            } else {
                $image_name = $request->get('last_icon');
            }

            $post = DB::update("
                update content_features set
                title='" . $request->get('title') . "', description='" . $request->get('description') . "', icon='" . $image_name . "'
                where id=" . $request->get('id'));
        }

        return redirect('cms-features');
    }

    public function addFeatures(Request $request)
    {
        if ($file = $request->file('image')) {
            $image_name = $this->compressAndConvertImage($file);
            $post = DB::insert("
                    insert into content_features (title,description,icon)
                    values('" . $request->get('title') . "', '" . $request->get('description') . "', '" . $image_name . "')
                ");
        }

        return redirect('cms-features');
    }
}
