<?php

namespace App\Controllers;

use App\Libraries\Uuid;
use App\Models\Follower;
use App\Models\Users;

class Profile extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }

    public function index($username)
    {
        $userModel = new Users();
        $user_info = $userModel->where('username', $username)->first();
        $following = $this->following($username);

        // get profile
        $profileModel = new \App\Models\Profile();
        $profile = $profileModel->where('user', $user_info['id'])->first();

        // get Posts 
        $postModel = new \App\Models\Post();
        $posts = $postModel->where('user', $user_info['id'])->findAll();

        $data = [
            'title' => " {$user_info['name']} (@{$user_info['username']})",
            'username' => $user_info['username'],
            'name' => $user_info['name'],
            'following' => $following,
            'picture' => $profile['picture'],
            'category' => $profile['category'],
            'bio' => $profile['bio'],
            'website' => $profile['website'],
            'posts' => $posts,
        ];

        // if user doesnt exist return page not found
        if(empty($user_info)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found '.$username);
        }

        return $this->view('profile/profile',$data);
    }

    public function view($page, $data){       
        echo view('/templates/header', ["title" => $data['title']]);
        echo view($page,$data);
        
    }

    


    public function createProfile(){
        $user = new \App\Models\Users();
        $userId = $user->where('username', 'darknight')->first()['id'];

        if(!$userId){
            return redirect()->back()->with('fail','Something went wrong');
        } else {
            // Create profile after creating user
            $profile = new \App\Models\Profile();
            $profile_data = [
                'bio' => null,
                'website' => null,
                'category' => null,
                'user' => $userId,
            ];

            $query = $profile->insert($profile_data);
            return redirect()->to('/darknight');
        }
    }

    public function follow($username){
        $userModel = new Users();
        $loggedUserId = $userModel->where('username', session()->get('loggedUser'))->first()['id'];
        $followeeId = $userModel->where('username', $username)->first()['id'];
        $followersModel = new Follower();

        $values = [
            'user_id' => $followeeId,
            'follower_id' => $loggedUserId,
        ];

        $query = $followersModel->insert($values);

        if(!$query){
            return redirect()->back()->with('fail','Something went wrong');
        } else {

        return redirect()->to('/'.$username);}
    }


    public function unfollow($username){

        $exists = $this->following($username);

        if($exists){
            // fetch ids
            $userModel = new Users();
            $loggedUserId = $userModel->where('username', session()->get('loggedUser'))->first()['id'];
            $followeeId = $userModel->where('username', $username)->first()['id'];
            // set values 
            $values = [
                'user_id' => $followeeId,
                'follower_id' => $loggedUserId,
            ];

            $followersModel = new Follower();
            $followersModel->delete($values);
        }
        return redirect()->to('/'.$username);
    }



    public function following($username){

        // check if logged user follows current profile
        $userModel = new Users();
        $loggedUserId = $userModel->where('username', session()->get('loggedUser'))->first()['id'];
        $followeeId = $userModel->where('username', $username)->first()['id'];
        $followersModel = new Follower();

        $values = [
            'user_id' => $followeeId,
            'follower_id' => $loggedUserId,
        ];

        $exists = $followersModel->find($values);

        if($exists) {
            return true;
        } else {
            return false;
        }
    }

    public function edit(){

        $userModel = new Users();
        $user_info = $userModel->where('username', session()->get('loggedUser'))->first();

        // get profile
        $profileModel = new \App\Models\Profile();
        $profile = $profileModel->where('user', $user_info['id'])->first();

        $data = [
            'title' => 'Edit Profile',
            'name' => $user_info['name'],
            'username' => $user_info['username'],
            'category' => $profile['category'],
            'website' => $profile['website'],
            'bio' => $profile['bio'],
        ];
        return $this->view('profile/edit',$data);
    }

    public function update(){
        // set validation rules
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your full name is required'
                ]
                ],
            'username' => [
                'rules' => 'required|max_length[25]',
                'errors' => [
                    'required' => 'Username is required',
                    'max_length' => 'Username must not exceed 25 characters',
                ]
                ],
            'category' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'category is required',
                ]
                ],
            'website' => [
                'rules' => 'valid_url',
                'errors' => [
                    'valid_url' => 'Enter a valid url'
                ]
                ],
            'bio' => [
                'rules' => 'max_length[150]',
                'errors' => [
                    'max_length' => 'Must be less than 150 characters'
                ]
                ],
        ]);

        // validate
        if(!$validation){
            $data = [
                "title" => 'Edit Profile',
                'validation' => $this->validator,
            ];

            return $this->view('/profile/edit',$data);
        } else {

            // get logged User's id
        $userModel = new Users();
        $loggedUserId = $userModel->where('username', session()->get('loggedUser'))->first()['id'];

        if(!$loggedUserId){
            return redirect()->back()->with('fail','Something went wrong');
        } else {
            // Create profile after creating user
            $profile = new \App\Models\Profile();

            $bio = $this->request->getPost('bio'); 
            $website = $this->request->getPost('website'); 
            $category = $this->request->getPost('category');
            $file = $this->request->getFile('profileImg');
            
            $Uuid = new Uuid();
            $profileImg_uid = $Uuid->v4();

            var_dump($file);

            // if new picture is uploaded. save to server and create a new path string
            if($file->getBasename() !== ""){
                $newFileName = $profileImg_uid.'.'.$file->guessExtension();
                $file->move('./uploads/'.session()->get('loggedUser').'/', $newFileName);

                $newPath = base_url('uploads/'.session()->get('loggedUser').'/'.$newFileName);
            }

            // move img to server
                
                $userModel = new \App\Models\Users();
                $postModel = new \App\Models\Post();

            $profile_data = [
                'bio' => $bio,
                'website' => $website,
                'category' => $category,
            ];

            // if image was stored to server, save path to db
            if(isset($newPath)){
                $profile_data['picture'] = $newPath;
            }



            $user_data = [
                'name' => $this->request->getPost('name'),
            ];

            if(null !== $this->request->getPost('username') && session()->get('loggedUser') !== $this->request->getPost('username')){ 
                $user_query = $userModel->update($loggedUserId,$user_data);
                session()->set('loggedUser', $this->request->getPost('username'));
            }

            $profile_id = $profile->where('user',$loggedUserId)->first()['id'];
            $query = $profile->update($profile_id,$profile_data);

            if(!$query && !$user_query){
                return redirect()->back()->with('fail','Something went wrong');
            } else {
                return redirect()->to('/'.session()->get('loggedUser'));
               
            }
        }

        }

        

    }
}

