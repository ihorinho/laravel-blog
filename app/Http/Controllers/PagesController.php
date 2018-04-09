<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy("created_at", "desc")->limit(4)->get();

        return  view('pages.wellcome')->withPosts($posts);
    }

    public function getAbout()
    {
        $testString1 = "Some test 1";
        $testString2 = "Test text 2";
        $data = [
            'fullname' => "Igor Pelekhatyy",
            'email' => "ihor1nho@gmail.com"
        ];

        return  view('pages.about')->withTestString1($testString1)
            ->with("testString2", $testString2)
            ->withData($data);
    }

    public function getContact()
    {
        return  view('pages.contact');
    }
}