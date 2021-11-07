<?php

namespace App\Controllers;

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

        // echo " {$user_info['name']} (@{$user_info['username']})";
        // echo $user_info['username'];
        // echo $user_info['name'];

        $data = [
            'title' => " {$user_info['name']} (@{$user_info['username']})",
            'username' => $user_info['username'],
            'name' => $user_info['name'],
            'following' => $following,
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
        $data = [
            'title' => 'Edit Profile'
        ];
        return $this->view('profile/edit',$data);
    }

    public function update(){
        // set validation rules
    }
}

