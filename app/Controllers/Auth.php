<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Libraries\Hash;

class Auth extends BaseController
{
    public function __construct(){
        helper(['url','form']);
    }

    public function index()
    {
        return $this->view('/auth/signin',['title' => 'Sign In']);
    }

    public function view($page, $data){       
        echo view('/templates/header', ["title" => $data->title]);
        echo view($page,$data);
        
    }

    public function signup(){
        return $this->view('/auth/signup',[]);
    }

    public function save(){

        // Validation
        // $validation = $this->validate([
        //     'name' => 'required',
        //     'username' => 'required|max_length[25]|is_unique[users.username]',
        //     'email' => 'required|valid_email|is_unique[users.email]',
        //     'password' => 'required|min_length[8]|max_length[15]',
        //     'cpassword' => 'required|min_length[8]|max_length[15]|matches[password]'
        // ]);

        // custom validation
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' =>[
                    'required' => 'Your full name is required',
                ]
                ],
            'username' => [
                'rules' => 'required|max_length[25]|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username is required',
                    'max_length' => 'Username must not exceed 25 characters',
                    'is_unique' => 'Username already taken',
                ]
                ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please enter a valid email address',
                    'is_unique' => 'Email is already taken',
                ]
                ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[15]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password is too short (minimum of 8 characters allowed)',
                    'max_length' => 'Password is too long (maximum of 15 characters allowed)',
                ]
                ],
            'cpassword' => [
                'rules' => 'required|min_length[8]|max_length[15]|matches[password]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password is too short (minimum of 8 characters allowed)',
                    'max_length' => 'Password is too long (maximum of 15 characters allowed)',
                    'matches' => "Passwords do not match"
                ]
                ],
            
        ]);

        if(!$validation){
            $data = [
                "title" => 'Sign Up',
                'validation' => $this->validator
            ];

            return $this->view('/auth/signup',$data);
        } 
        
        else{
            $name = $this->request->getPost('name');
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'name' => esc($name),
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
            ];

            // Create user instance and commit to database
            $user = new \App\Models\Users();
            $query = $user->insert($values);

            if(!$query){
                return redirect()->back()->with('fail','Something went wrong');
            } else {
                $user_info = $user->where('id', $user->insertID)->first();
                $user_username = $user_info['username'];

                // Create profile after creating user
                $profile = new \App\Models\Profile();
                $profile_data = [
                    'bio' => null,
                    'website' => null,
                    'category' => null,
                    'user' => $user_info['id']
                ];

                $new_query = $profile->insert($profile_data);

                if(!$new_query){
                    return redirect()->back()->with('fail','Failed to create profile');
                } else{

                    session()->set('loggedUser', $user_username);
                    return redirect()->to('/'.$user_username);
                }

            }


        }

    }

    public function check(){
         $validation = $this->validate([
             'email' => [
                 'rules' => 'required|valid_email|is_not_unique[users.email]',
                 'errors' => [
                     'required' => 'Email is required',
                     'valid_email' => 'Enter a valid email address',
                     'is_not_unique' => 'Email is not registered to any account'
                 ]
                 ],
                 'password' => [
                    'rules' => 'required|min_length[8]|max_length[15]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password is too short (minimum of 8 characters allowed)',
                        'max_length' => 'Password is too long (maximum of 15 characters allowed)',
                    ]
                    ],
                ]);

                if(!$validation){
                    $data = [
                        "title" => 'Sign In',
                        'validation' => $this->validator
                    ];
                    return $this->view('/auth/signin',$data);

                }else{

                    // fetch data from database
                    $email = $this->request->getPost('email');
                    $password = $this->request->getPost('password');

                    $userModel = new \App\Models\Users();
                    $user_info = $userModel->where('email', $email)->first();

                    $check_pass = Hash::check($password, $user_info['password']);

                    if(!$check_pass){
                       
                        return redirect()->to('/auth')->with('fail', 'Incorrect Password');
                    }else {
                        $user_username = $user_info['username'];
                        session()->set('loggedUser', $user_username);
                        return redirect()->to('/')->withInput();
                    }
                }
    }

    public function signout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/auth')->with("fail", 'You are logged out!');
        }
    }
}
