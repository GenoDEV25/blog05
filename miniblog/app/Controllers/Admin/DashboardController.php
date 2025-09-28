<?php

namespace App\Controllers\Admin; // The namespace reflects the folder structure

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    /**
     * Displays the main admin dashboard page.
     */
    public function index()
    {
        // Just load the view
        return view('admin/dashboard');
    }
}