<?php

namespace App\Repositories;
use Exception;
use App\Http\Controllers;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\ShowTime;

class ShowtimeRepository implements ShowtimeInterface{

    protected $show;

    public function __construct(ShowTime $show){
        $this->show = $show;
    }
    public function all(){
        return ShowTime::orderBy('id', 'asc')->paginate(8);
    }

    public function getCinema(){
        return Cinema::get();
    }

    public function getMovie(){
        return Movie::get();
    }

    public function edit($id){
        return ShowTime::findorfail($id);
    }

    public function store(array $data){

        return ShowTime::create($data);
    }

    public function update($id, array $data){
        $showtime = ShowTime::findorfail($id)->update($data);

        if(empty($showtime)){
            toastr()->error('Showtime not found!');
            return redirect()->back();
        }


        return $showtime;
    }

    public function delete($id){
        return ShowTime::destroy($id);
    }


}
