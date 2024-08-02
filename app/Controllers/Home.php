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
            // 'posts' => $model->find($post_id) 
            'posts' => $model->where('id_number', $post_id)->findAll()
        ];
        return view('show',$data);
    }
    public function store()
    {
        $model = new Post();
        $data = [
            "username"	    => 'user1',
            "Permissions"	=> 'user',
            "password"	    => 'asd123',
            "name"	        => $this->request->getVar('name'),
            "gender"	    => $this->request->getVar('gender'),
            "ID_number"	    => $this->request->getVar('id_number'),
            "address"	    => $this->request->getVar('address'),
            "phone_number"	=> $this->request->getVar('phone'),
            "email"	        => $this->request->getVar('email'),
            "origin_school"	=> $this->request->getVar('school'),
            "subject"	    => $this->request->getVar('department'),
            "status"	    => '報名中',
        ];
        $isValidFormat = $model->checkTWIDFormat($data['ID_number']);
        $exists = $model->checkIfExists('ID_number', $data['ID_number']);
        if ($isValidFormat == false) {
            echo '<script>alert("請檢查身分證格式");</script>';
            return view('register/sign_up_information');
        }
        if ($exists) {
            echo '<script>alert("請檢查是否有重複申請");</script>';
            return view('register/sign_up_information');
        }
        $YN = $model->save($data);
        header("Location: /home/show/".$data['ID_number']);
        exit();
    }
    public function sign_up_information(): string
    {
        return view('register/sign_up_information');
    }
}
