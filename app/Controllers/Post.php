<?php

namespace App\Controllers;

use App\Libraries\Uuid;
use App\Models\Users;

class Post extends BaseController
{


    public function __construct(){
        helper(['url','form']);
    }

    public function index()
    {
        
    }

    public function create(){
        $data = [
            'title' => 'Create new post',
            'username' => session()->get('loggedUser'), 
        ];
        $this->view('/post/create',$data);
    }

    public function save(){
        // validation rules
        $validation = $this->validate([
            'caption' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'caption is required'
                ],
            ]
        ]);

        if(!$validation){
            $data = [
                'title' => 'Create new post',
                'validation' => $this->validator, 
            ];

            return $this->view('/post/create', $data);
            
        } else {
            $Uuid = new Uuid();
            $post_uid = $Uuid->v4();
            $caption = $this->request->getPost('caption');
            $file = $this->request->getFile('postImg');
            
            $newFileName = $post_uid.'.'.$file->guessExtension();
            $file->move('./uploads/'.session()->get('loggedUser').'/', $newFileName);

            $newPath = base_url('uploads/'.session()->get('loggedUser').'/'.$newFileName);

            // move img to server

                $userModel = new \App\Models\Users();
                $postModel = new \App\Models\Post();
                $values = [
                    'uuid' => $post_uid,
                    'user' => $userModel->where('username',session()->get('loggedUser'))->first()['id'],
                    'image' => $newPath,
                    'description' => $caption,
                    'createdAt' => date('Y-m-d H:i:s'),
                    'updatedAt' => date('Y-m-d H:i:s'),
                ];

               $query = $postModel->insert($values);

               if(!$query){
                return redirect()->back()->with('fail','Something went wrong');
                } else {
                    return redirect()->to('/'.session()->get('loggedUser'));
            }
            

        }
    }

    public function show($user, $post_id){
        echo "This post exists" . $post_id;
    }
}
