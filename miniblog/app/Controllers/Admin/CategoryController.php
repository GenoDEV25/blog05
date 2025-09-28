<?php

namespace App\Controllers\Admin;

use App\Models\CategoryModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class CategoryController extends ResourceController
{
    /**
     * Display all categories
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $model = new CategoryModel();
        $data = [
            'categories' => $model->findAll(),
        ];
        return view('admin/categories/index', $data);
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
     * Show the form to create a new catogory
     *
     * @return ResponseInterface
     */
    public function new()
    {
        return view('admin/categories/form');
    }

    /**
     * Process the form submission and create a new category
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $model = new CategoryModel();

        // validation rules
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]|is_unique[categories.name]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => request()->getPost('name'),
        ];

        $model->save($data);

        return redirect()->to('/admin/categories')->with('success', 'Category created successfully');
    }

    /**
     * Show the form to edit the specified category
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $model = new CategoryModel();
        $data = [
            'category' => $model->find($id),
        ];
        return view('admin/categories/form', $data);
    }

    /**
     * Process the form submission and update the specified category
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $model = new CategoryModel();

        // validation rules
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]|is_unique[categories.name,id,' . $id . ']',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => request()->getPost('name'),
        ];

        $model->update($id, $data);

        return redirect()->to('/admin/categories')->with('success', 'Category updated successfully');
    }

    /**
     * Delete a category
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $model = new CategoryModel();
        $model->delete($id);
        return redirect()->to('/admin/categories')->with('success', 'Category deleted successfully');
    }
}
