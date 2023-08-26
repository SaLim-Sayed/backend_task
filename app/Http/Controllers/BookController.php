<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Traits\OfferTrait;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use OfferTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id','DESC')->get();
        return view('books.books', compact('books'));
    }
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addBook(BookRequest $request)
    {
        $file_name = $this->saveImage($request->file, 'uploads/books');
        $img_name = $this->saveImage($request->img, 'uploads/books');
        Book::create([
            'title' => $request->title,
            'auther' => $request->auther,
            'page_count' => $request->page_count,
            'size' => $request->size,
            'file' => $file_name,
            'img' => $img_name,
            'lang' => $request->lang
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }
    public function updateBook(Request $request)
    {
        // $file_name = $this->saveImage($request->update_file, 'uploads/books');

        Book::where('id', $request->update_id)->update([
            'title' => $request->update_title,
            'auther' => $request->update_auther,
            'page_count' => $request->update_page_count,
            'size' => $request->update_size,
            'lang' => $request->update_lang,
            // 'file' => $request-> $file_name
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function deleteBook(Request $request)
    {
        Book::find($request->book_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $books =  Book::where('title', 'like', "%$keyword%")->get();
        return response()->json($books);
    }
}
