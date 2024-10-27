<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateValidationRequest;
use App\Http\Requests\UpdateValidationRequest;
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

        // Kiểm tra xem có file được upload không
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $generatedImageName = 'image_'.time().'-'.$request->name.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $generatedImageName);
            $book->image_path = $generatedImageName;
        }

        $book->save();
        return redirect('/books');
    }

    public function edit($id) {
        $book = Books::find($id)    ;
        return view('books.edit')->with('book', $book);
    }

    public function update(UpdateValidationRequest $request, $id) {
        $request->validated();
        $book = Books::findOrFail($id);
        $updateData = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ];

        if ($request->hasFile('image_path')) {
            if ($book->image_path) {
                $oldImagePath = public_path('images/' . $book->image_path);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }


            $file = $request->file('image_path');
            $generatedImageName = 'image_'.time().'-'.$request->name.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images'), $generatedImageName);


            $updateData['image_path'] = $generatedImageName;
        }

        
        Books::where('id', $id)->update($updateData);

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
