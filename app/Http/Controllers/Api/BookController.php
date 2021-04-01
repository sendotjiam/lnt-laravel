<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return response()->json([
            'status' => 200,
            'message' => 'All books',
            'data' => $books
        ]);
    }

    public function store(Request $request) {
        $validator = \Validator::make($request->all(), [
            'title' => 'required|min:10|max:255',
            'author' => 'required|min:10|max:255',
            'file' => 'image|mimes:jpeg,png,jpg'
        ]);

        if ($validator->errors()) {
            return response()->json($validator->errors());
        }

        $path = $request->file('image')->store('book_images');

        Book::create([
            'title' => $request->title,
            'author'=> $request->author,
            'file' => $path
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Book added successfully',
        ]);
    }

    // public function show($id) {
    //     $book = Book::find($id);
    //     return response()->json([
    //         'status' => 200,
    //         'data' => $book
    //     ]);
    // }

    public function update(Request $request, $id) {
        $book = Book::find($id);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Updated'
        ]);
    }

    public function delete($id) {
        $book = Book::find($id);
        \Storage::delete($book->file);
        $book->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Delete success'
        ]);
    }
}
