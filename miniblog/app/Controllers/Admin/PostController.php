<?php

namespace App\Controllers\Admin;

use App\Models\PostModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CategoryModel;

class PostController extends ResourceController
{
    /**
     * Display a list of all posts
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $postModel = new PostModel();
        $data = [
            'posts' => $postModel->getPostsWithCategory(),
        ];
        return view('admin/posts/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Show the form to create a new resource object.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $categoryModel = new CategoryModel();
        $data = [
            'categories' => $categoryModel->findAll(),
        ];
        return view('admin/posts/form', $data);
    }

    /**
     * Process the form submission and create a new post
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $postModel = new PostModel();

        // validation rules as a per the technical test requirments
        $rules = [
            'title' => 'required|min_length[5]|max_length[255]',
            'summary' => 'required|min_length[10]',
            'category_id' => 'required|is_natural_no_zero',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // handle the image upload
        $image = request()->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            // FCPATH points to the 'public' directory
            $image->move(FCPATH . 'uploads/posts', $newName);

            $data = [
                'title' => request()->getPost('title'),
                'summary' => request()->getPost('summary'),
                'category_id' => request()->getPost('category_id'),
                'image_path' => $newName,
            ];

            $postModel->save($data);

            return redirect()->to('/admin/posts')->with('success', 'Post created successfully');
        }

        return redirect()->back()->withInput()->with('errors', ['image' => 'Image upload failed']);
    }

    /**
     * show the form to edit an existing post
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $postModel = new PostModel();
        $categoryModel = new CategoryModel();

        $data = [
            'post' => $postModel->find($id),
            'categories' => $categoryModel->findAll(),
        ];

        if (empty($data['post'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the post with ID: ' . $id);
        }

        return view('admin/posts/form', $data);
    }

    /**
     * Process the form submission and update an existing post
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $postModel = new PostModel();
        // First, get the existing post from the database
        $post = $postModel->find($id);

        if (!$post) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the post with ID: ' . $id);
        }

        // Rules are similar to create(), but the image is optional.
        $rules = [
            'title'       => 'required|min_length[5]|max_length[255]',
            'summary'     => 'required|min_length[10]',
            'category_id' => 'required|is_natural_no_zero',
        ];

        // Get the uploaded image file
        $image = request()->getFile('image');

        // If a new image is uploaded, add validation rules for it.
        if ($image && $image->isValid()) {
            $rules['image'] = 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'       => request()->getPost('title'),
            'summary'     => request()->getPost('summary'),
            'category_id' => request()->getPost('category_id'),
        ];

        // --- Handle Image Upload (if a new one was provided) ---
        if ($image && $image->isValid() && !$image->hasMoved()) {
            // Delete the old image file to save space
            if (!empty($post['image_path']) && file_exists(FCPATH . 'uploads/posts/' . $post['image_path'])) {
                unlink(FCPATH . 'uploads/posts/' . $post['image_path']);
            }

            // Upload the new image
            $newName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/posts', $newName);

            // Add the new image path to our data array to be saved in the DB
            $data['image_path'] = $newName;
        }

        $postModel->update($id, $data);

        return redirect()->to('/admin/posts')->with('success', 'Post updated successfully.');
    }

    /**
     * Delete a post
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $postModel = new PostModel();

        // find the post to get the image path
        $post = $postModel->find($id);
        if ($post && !empty($post['image_path'])) {
            // Construct the full path to the image
            $imagePath = FCPATH . 'uploads/posts/' . $post['image_path'];
            // Delete the image file if it exists
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the post from the database
        $postModel->delete($id);

        return redirect()->to('/admin/posts')->with('success', 'Post deleted successfully.');
    }
}
