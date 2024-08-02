<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\Permission;
use App\Models\RegisterStatus;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new Post();
        $data = [
            'posts' => $model->findall()
        ];
        // echo count($data['posts']);
        // return view('welcome_message',$data);
        return view('welcome_message');
    }
    public function login(): string
    {
        $model = new Post();
        $data = [
            'posts' => $model->findall()
        ];
        return view('login/login',$data);
    }
    public function show($post_id){
        $model = new Post();
        $data = [
            'posts' => $model->find($post_id) 
            // 'posts' => $model->where('username', $post_id)->findAll()
        ];
        return view('show',$data);
    }
    public function sign_up_information(): string
    {
        return view('register/sign_up_information');
    }
}
