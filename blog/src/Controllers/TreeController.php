<?php

namespace Bebro\Blogas\Controllers;

use Bebro\Blogas\App;
use Bebro\Blogas\Models\Tree;

class TreeController
{
    public function index()
    {
        $trees = Tree::all();
        if (!$trees) {
            return App::view('tree/empty', ['title' => 'Bebro Blogas']);
        }
        return App::view('tree/index', ['trees' => $trees]);
    }

    public function create()
    {
        return App::view('tree/create');
    }

    public function store()
    {
        $tree = new Tree();
        $tree->name = $_POST['name'] ?? '';
        $tree->store();

        return App::redirect('tree', ['message' =>
            [
                'text' => 'Tree created successfully!',
                'type' => 'success'
            ]
        ]);
    }

    public function edit($id)
    {
        $tree = Tree::find($id);
        if (!$tree) {
            return App::view('404', ['title' => 'Tree Not Found']);
        }
        return App::view('tree/edit', ['tree' => $tree]);
    }

    public function update($id)
    {
        $tree = Tree::find($id);
        if (!$tree) {
            return App::view('404', ['title' => 'Tree Not Found']);
        }

        $tree->name = $_POST['tree'] ?? '';
        $tree->update($id);

        return App::redirect('tree', ['message' =>
            [
                'text' => 'Tree updated successfully!',
                'type' => 'success'
            ]
        ]);
    }

    public function delete($id)
    {
        $tree = Tree::find($id);
        if (!$tree) {
            return App::view('404', ['title' => 'Tree Not Found']);
        }

        $tree->delete($id);

        return App::redirect('tree', ['message' =>
            [
                'text' => 'Tree deleted successfully!',
                'type' => 'success'
            ]
        ]);
    }
}