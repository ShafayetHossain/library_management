<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Publication;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function GuzzleHttp\Promise\all;

class LibraryController extends Controller
{
    public function showCategory(){
        $categories = Category::all();
        return view('category', compact('categories'));
    }
    public function saveCategory(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'CategoryName' => 'required|max:50'
        ]);

        if (!$validator->fails()){
            $category = new Category;
            $category->name = $request->CategoryName;
            $category->save();
        }
        return redirect()->back();
    }
    public function deleteCategory($id){
        $categories = Category::findorfail($id);
        $categories->delete();
        return redirect()->back();
    }
    public function editCategory($id){
        $categories = Category::findorfail($id);
        return view('category_edit', compact('categories'));
    }
    public function updateCategory(Request $request,$id){
        //dd($request->all(),$id);
        $categories = Category::findorfail($id);
       // dd($categories);
        $categories->name = $request->CategoryName;
        $categories->save();
        return redirect('/category');
    }




    public function showPublication(){
        $publication = Publication::all();
        return view('publication', compact('publication'));
    }
    public function savePublication(Request $request){
        $validator = Validator::make($request->all(), [
            'publication_name' => 'required|max:50'
        ]);

        if (!$validator->fails()) {
            $publication = new Publication;
            $publication->name = $request->publication_name;
            $publication->save();
        }
        return redirect()->back();
    }
    public function deletePublication($id){
        $publication = Publication::findorfail($id);
        $publication->delete();
        return redirect()->back();
    }
    public function editPublication($id){
        $publication = Publication::findorfail($id);
        return view('publication_edit', compact('publication'));
    }
    public function updatePublication(Request $request,$id){
        //dd($request->all(),$id);
        $publication = Publication::findorfail($id);
        // dd($categories);
        $publication->name = $request->publication_name;
        $publication->save();
        return redirect('/publication');
    }


    public function showWriter(){
        $writer = Writer::all();
        return view('writer', compact('writer'));
    }
    public function saveWriter(Request $request){
        $validator = Validator::make($request->all(), [
            'writer_name' => 'required|max:50'
        ]);
        if (!$validator->fails()) {
            $writer = new Writer;
            $writer->name = $request->writer_name;
            $writer->save();
        }
        return redirect()->back();
    }
    public function deleteWriter($id){
        $writer = Writer::findorfail($id);
        $writer->delete();
        return redirect()->back();
    }
    public function editWriter($id){
        $writer = Writer::findorfail($id);
        return view('writer_edit', compact('writer'));
    }
    public function updateWriter(Request $request,$id){
        //dd($request->all(),$id);
        $writer = Writer::findorfail($id);
        // dd($categories);
        $writer->name = $request->writer_name;
        $writer->save();
        return redirect('/writer');
    }


    public function showBook(){
        $book['books'] = Book::get();
        $book['categories'] = Category::get();
        $book['publications'] = Publication::get();
        $book['writers'] = Writer::get();
        return view('book', $book);
    }
    public function saveBook(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'category_id'=> 'required',
            'publication_id'=> 'required',
            'writer_id'=> 'required',

        ]);
        if (!$validator->fails()) {
            $book = [
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'publication_id' => $request->publication_id,
                'writer_id' => $request->writer_id,
            ];

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $book['image'] = $imageName;
            }

            Book::create($book);
        }
        return redirect()->back();
    }
    public function deleteBook($id){
        $book =Book::findorfail($id);
        $book->delete();
        return redirect()->back();
    }
    public function editBook($id){
        $book =Book::findorfail($id);
        return view('book_edit', compact('book'));
    }

    public function userView(){
        $book['books'] = Book::get();
        $book['categories'] = Category::get();
        $book['publications'] = Publication::get();
        $book['writers'] = Writer::get();
        return view('welcome', $book);
    }

    public function updateBook(Request $request,$id){
        //dd($request->all(),$id);
        $book = Book::findorfail($id);
        // dd($categories);
        $book->name = $request->name;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->publication_id = $request->publication_id;
        $book->writer_id = $request->writer_id;
        $book->image = $request->image;

        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $book->image = $imageName;
        }
        $book->save();
        return redirect('/book');
    }


    public function userSearch(Request $request){
        if (!empty($request)){
            $book['books'] = Book::where('name','LIKE', '%'. $request->book .'%')->get();
            return view('book_search', $book);
        }

    }

    public function aboutVieW(){

        return view('about');
    }
}
