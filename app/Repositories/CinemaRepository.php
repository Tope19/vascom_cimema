<?php

namespace App\Repositories;
use Exception;
use App\Models\Cinema;

class CinemaRepository implements CinemaInterface{

    protected $cinema;

    public function __construct(Cinema $cinema){
        $this->cinema = $cinema;
    }
    public function all(){
        return Cinema::orderBy('id', 'asc')->paginate(8);
    }

    public function edit($id){
        return Cinema::findorfail($id);
    }

    public function store(array $data){

        return Cinema::create($data);   
    }

    public function update($id, array $data){
        $cinema = Cinema::findorfail($id)->update($data);

        if(empty($cinema)){
            toastr()->error('Cinema not found!');
            return redirect()->back();
        }

        if(!empty($cinema->image)){
            try{
                unlink(public_path('/cinema_images').'/'.$cinema->image);
            }
            catch(Exception $e){
                toastr()->error('Couldn`t delete old image!');
            }
        }
        return $cinema;
    }

    public function delete($id){
        return Cinema::destroy($id);
    }


}
