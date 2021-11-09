<?php

namespace App\Controllers;
use App\Models\Post;
use App\Models\Users;
use App\Models\Profile;

class Feed extends BaseController
{
    public function index()
    {
        // Mock Feed using All Posts 
        $postModel = new Post();
        $userModel = new Users();
        $profileModel = new Profile();

        $posts = $postModel->findAll();
        $feedPosts = [];
        
        foreach ($posts as $post) {
            $user_info = $userModel->find($post['user']);
            $profileImg = $profileModel->where('user',$post['user'])->first()['picture'];
            $feedPosts[$post['id']] = ['post' => $post, 'user' => $user_info, 'picture' => $profileImg];
        }
        return $this->view('/feed/index',['title' => 'Feed', 'feedPosts' => $feedPosts]);
    }

    public function view($page, $data){       
        echo view('/templates/header', ["title" => $data->title]);
        echo view($page,$data);
        
    }
}
