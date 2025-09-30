<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // The table associated with this model
    protected $table = 'users';
    // The primary key for the table
    protected $primaryKey = 'id';

    // The fields that are allowed to be inserted or updated
    protected $allowedFields = ['email', 'password_hash'];

    // We don't need timestamps for this model
    protected $useTimestamps = false;
}
