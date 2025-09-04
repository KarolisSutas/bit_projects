<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        // $books = Book::orderBy('id', 'desc')->paginate(7);
        
        // objektas kuriame irasyta duomenu bazes uzklausa Book::orderBy('id', 'desc')
        // get uzklausa ivykdo ir gaunama kolekcija. Objektas kuris turi geru savybiu papildomu:

        // dd(Book::orderBy('id', 'desc')->get()->map(fn($b) => $b->pages)->filter(fn($p) => $p > 200)->count()); // dd debug and die. 
        
        //formuojama uzklausa, get arba paginate vykdo uzklausa

        $sort = $request->input('sort');
        $show_all = $request->input('show_all') ?? 0;
        $min_pages = $request->input('min_pages') ?? 100;

        $sql = Book::query();
 
        $sql = match($sort) {
            'author' => $sql->orderBy('author'),
            'title' => $sql->orderBy('title'),
            'pages' => $sql->orderBy('pages'),
            default => $sql,
        };
        
        if ($min_pages) {
            // $sql = $sql->where('pages', '>=', $min_pages); 
            $sql = $sql->whereRaw('pages >= ?', [$min_pages]);
        }

        if ($show_all) {
             $books = $sql->get();
        } else {
            $books = $sql->paginate(7)->withQueryString();
        }

        // $books = $sql->get();

        return view('books.index', [
            'books' => $books,
            'sort' => $sort,
            'show_all' => $show_all,
            'min_pages' => $min_pages,
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('books-index');
    }

    public function edit($id)
    {
        $user = auth()->user();

        if (!$user || $user->role !== 'Admin') {
            abort(403);
        }

        $book = Book::find($id);
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->update($request->all());
        return redirect()->route('books-index');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        return view('books.delete', ['book' => $book]);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books-index');
    }
}