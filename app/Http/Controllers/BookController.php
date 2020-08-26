<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class BookController extends Controller
{
    /**
     * Require auth on all routes except index and show
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ISBN' => 'required|unique:books,ISBN|min:10|max:13',
        ]);

        $isbn = $validatedData['ISBN'];

        if($isbn) {
            $url = 'https://openlibrary.org/api/books?bibkeys=ISBN:'.$isbn.'&jscmd=details&format=json';
            $client = new Client();
            $response = $client->request('GET', $url);

            $data = json_decode($response->getBody(), true)['ISBN:'.$isbn];

            $book = new Book();
            $book->title = isset($data['details']['title']) ? $data['details']['title'] : '';
            $book->summary = isset($data['details']['description']) ? $data['details']['description']['value'] : '';
            $book->cover = isset($data['thumbnail_url']) ? $data['thumbnail_url'] : ''; // -S.jpg || -L.jpg || -M.jpg
            $book->ISBN = $isbn;
            $book->publication_date = isset($data['details']['publish_date']) ? $data['details']['publish_date'] : '';

            $book->save();

            return redirect()->route('books.show', [$book]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view(
            'book.show',
            [
                'book' => Book::find($book->id),
                'status' => 'Book successfully added !'
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
