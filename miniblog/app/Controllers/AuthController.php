<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    /**
     * Displays the login form view
     */
    public function index()
    {
        return view('admin/login');
    }

    /**
     * Handles the login form submission and authenticates the user
     */
    public function login()
    {
        // load the validation service
        $validation = \Config\Services::validation();

        // set validation rules for email and password
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        // run validation
        if (!$this->validate($rules)) {
            // if it fails, redirect back to the login form with errors
            return redirect()->to('/admin/login')->withInput()->with('errors', $validation->getErrors());
        }

        // get the submitted credentials from the form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // find the user in the database by their email
        $model = new UserModel();
        $user = $model->where('email', $email)->first();

        // check if the user exists and if the password is correct
        if (!$user || !password_verify($password, $user['password_hash'])) {
            // if the credentials are wrong, redirect back with a generic error message
            return redirect()->to('/admin/login')->with('error', 'Invalid credentials');
        }

        // if credentials are correct, store the user info in the session
        $session = session();
        $sessionData = [
            'user_id' => $user['id'],
            'email' => $user['email'],
            'isLoggedIn' => true
        ];
        $session->set($sessionData);

        // redirect to the home page
        return redirect()->to('/');
    }

    /**
     * Logs out the user by destroying the session
     */
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/')->with('success', 'You have been logged out');
    }
}
