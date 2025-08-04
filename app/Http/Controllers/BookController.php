<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book; 

class BookController extends Controller
{
    // Display list
    public function index()
    {
        $books = Book::orderBy('book_name')->paginate(15);
        return view('books.index', compact('books'));
        // return view('books.index');
    }

    // Show create form
    public function create()
    {
        // echo "Create a new book";
        // die();
        $frequencies = Book::frequencies();
        // die('Create a new book');
        return view('books.create', compact('frequencies'));
    }

    // Save new book
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'book_name'             => 'required',
            'book_edition'               => 'nullable',
            'price'                 => 'required',
            'publication_frequency' => 'required',
            'notes'                 => 'nullable',
        ]);

        Book::create($data);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    // Show single book (optional)
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Show edit form
    public function edit(Book $book)
    {
        $frequencies = Book::frequencies();
        return view('books.edit', compact('book', 'frequencies'));
    }

    // Update book
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'edition'               => 'nullable|string|max:255',
            'price'                 => 'required|numeric|min:0',
            'publication_frequency' => 'required|in:'.implode(',', array_keys(Book::frequencies())),
            'notes'                 => 'nullable|string',
        ]);

        $book->update($data);
        return redirect()->route('books.index')
                         ->with('success', 'Book updated successfully.');
    }

    // Delete book
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
                         ->with('success', 'Book deleted successfully.');
    }
}
