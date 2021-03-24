<?php

namespace App\Repositories;
use Exception;
use App\Http\Controllers;
use App\Models\Movie;
use App\Models\Cinema;

class MovieRepository implements MovieInterface{

    protected $movie;

    public function __construct(Movie $movie){
        $this->movie = $movie;
    }
    public function all(){
        return Movie::orderBy('id', 'asc')->paginate(8);
    }

    public function get(){
        return Cinema::get();
    }

    public function edit($id){
        return Movie::findorfail($id);
    }

    public function store(array $data){

        return Movie::create($data);
    }

    public function update($id, array $data){
        $movie = Movie::findorfail($id)->update($data);

        if(empty($movie)){
            toastr()->error('movie not found!');
            return redirect()->back();
        }

        if(!empty($movie->image)){
            try{
                unlink(public_path('/movie_images').'/'.$movie->image);
            }
            catch(Exception $e){
                toastr()->error('Couldn`t delete old image!');
            }
        }
        return $movie;
    }

    public function delete($id){
        return Movie::destroy($id);
    }


}
