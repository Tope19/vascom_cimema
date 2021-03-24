<?php

namespace App\Http\Controllers;

use App\Repositories\MovieRepository;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository){
        $this->movieRepository = $movieRepository;
    }


    public function index()
    {
        $movies = $this->movieRepository->all();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cinemas = $this->movieRepository->get();
        return view('admin.movies.create', compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->movieRepository->store($this->validateData($request));
        toastr()->success('Movie added successfully!');
        return redirect()->route('admin.movies.index');
    }

    private function validateData(Request $request , $mode = 'required'){
        $data = $request->validate([
            'cinema_id' => 'required|exists:cinemas,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'image' =>  $mode.'|image',
        ]);

        if($image = $request->file('image')){
            $filename = time().'.'.$image->extension();
            $destinationPath = public_path('/movie_images');
            $image->move($destinationPath, $filename);
            $data['image'] = $filename;
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cinemas = $this->movieRepository->get();
        $movie = $this->movieRepository->edit($id);
        return view('admin.movies.edit',compact('cinemas','movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->movieRepository->update($id, $this->validateData($request, 'nullable'));
        toastr()->success('Movie Updated successfully!');
        return redirect()->route('admin.movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->movieRepository->delete($id);
        toastr()->success('Movie deleted successfully!');
        return redirect()->back();
    }
}
