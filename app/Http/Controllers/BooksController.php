<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Storage;


class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function __construct()
    {
        $this->middleware('auth');

        //if(Auth::user()->isAdmin() == 0){
            //return "you are a user ";
        //}
    }
    public function index()
    {
        $user = Auth::user();
        // for some reason when I tried to make it seperated function the redirect is not working !! 
        if(Auth::user()->isAdmin == 0 )return redirect('/');
        $books = Book::all();
        //$book = Book::where('title', 'testawy')->first();
        //dd($book);


        return view('books.index' , ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin == 0 )return redirect('/');
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->isAdmin == 0 )return redirect('/');
        $validData = $this->validData();

        if(Book::where('title', $request->title)->first()){
            $book = Book::where('title', $request->title)->first();
        }else{
            $book = Book::create($validData);
        }
        $book->numOfProduct++;
        $book->save();
        $this->storeCover($book);


        // \DB::table('books')->insert($validData);

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->isAdmin == 0 )return redirect('/');
        return('books.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->isAdmin == 0 )return redirect('/');
        $book = Book::findOrFail($id);
        return view('books.edit', ['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->isAdmin == 0 )return redirect('/');
        $validData = $this->validData();
        //$book = Book::where('id', $id)->update($validData);
        $book = Book::findOrFail($id);
        $book->update($validData);

        if(request()->has('cover')){
            Storage::delete("public/".$book->cover);
        }
        $this->storeCover($book);
        

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->isAdmin == 0 )return redirect('/');
        $book = Book::find($id);
        Storage::delete("public/".$book->cover);
        Book::destroy($id);

        return redirect('/books');
    }

    private function validData(){

        return tap(
            request()->validate(
                [
                    'title' =>'required',
                    'author' =>'required',
                    'description' => 'required',
                    'price' =>'required'
                ]),
            function (){
                if (request()->hasFile('cover')){
                    request()->validate(
                        [
                            'cover' => 'File|Image',
                        ]
                    );}}
        );




    }

    private function storeCover($book)
    {
        if (request()->has('cover')){
            $book-> update([
                'cover' => request()->cover->store('uploads','public')
            ]);
        }
    }

    
}
