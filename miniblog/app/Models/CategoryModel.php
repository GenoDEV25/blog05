<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    // The table this model represents
    protected $table            = 'categories';
    // The primary key of the table
    protected $primaryKey       = 'id';

    // The fields that are allowed to be mass-assigned
    protected $allowedFields    = ['name'];

    // Enable the automatic use of created_at and updated_at fields
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    // We don't have an updated_at field in our categories table, so we set this to null
    protected $updatedField  = ''; 
}
