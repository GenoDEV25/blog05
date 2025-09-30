<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    // The table this model represents
    protected $table = 'posts';
    // The primary key of the table
    protected $primaryKey = 'id';

    // The fields that are allowed to be mass-assigned
    protected $allowedFields = ['category_id', 'title', 'summary', 'image_path'];

    // Enable the automatic use of created_at and updated_at fields
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * A custom method to get all posts with their category name.
     * We use a Query Builder join for this.
     */
    public function getPostsWithCategory()
    {
        return $this->select('posts.*, categories.name as category_name')
                    ->join('categories', 'categories.id = posts.category_id')
                    ->findAll();
    }
}
