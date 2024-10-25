<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index() {
        $books = Books::all();
        //filter
//        $books = Books::where('name', '=', 'Hai so phan')
//            ->get();
        return view('books.index', [
            'books' => $books
        ]);
    }

    public function create() {
        $categories = Category::all();
        return view('books.create', ['categories' => $categories]);
    }

    public function show($id) {
        $book = Books::find($id);
        $category = Category::find($book->category_id);
        $book->category = $category;
        $categories  = Category::all();
        return view('books.show', ['book' => $book, 'categories' => $categories]);
    }

    public function store(CreateValidationRequest $request) {
        $request->validated();

        $book = new Books();
        $book->name = $request->input('name');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->category_id = $request->input('category_id');
        $book->save();
        return redirect('/books');
    }

    public function edit($id) {
        $book = Books::find($id)    ;
        return view('books.edit')->with('book', $book);
    }

    public function update(CreateValidationRequest $request, $id) {
        $request->validated();
        $book = Books::where('id', $id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);
        return redirect('/books');
    }

    public function confirmDestroy($id) {
        $book = Books::find($id);
        return view('books.delete', ['book' => $book]);
    }
    public function destroy($id) {
        $book = Books::find($id);
        if ($book) {
            $book->delete();
        }
        return redirect('/books')->with('success', 'Book deleted successfully!');
    }
}
