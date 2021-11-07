<?php

namespace App\Controllers;

use App\Libraries\Uuid;

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
           
            echo $newPath;

            echo $post_uid . '<br>';
            echo $caption . '<br>';
            echo '<pre>';
            var_dump($_FILES);
            echo '</pre>';

            // move img to server


                $postModel = new \App\Models\Post();
                $values = [
                    'uuid' => $post_uid,
                    'user' => session()->get('loggedUser'),
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
