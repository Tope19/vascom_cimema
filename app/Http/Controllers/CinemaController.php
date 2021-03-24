<?php

namespace App\Http\Controllers;

use App\Repositories\CinemaRepository;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $cinemaRepository;

    public function __construct(CinemaRepository $cinemaRepository){
        $this->cinemaRepository = $cinemaRepository;
    }


    public function index()
    {
        $cinemas = $this->cinemaRepository->all();
        return view('admin.cinemas.index', compact('cinemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cinemas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->cinemaRepository->store($this->validateData($request));
        toastr()->success('Cinema added successfully!');
        return redirect()->route('admin.cinemas.index');
    }

    private function validateData(Request $request , $mode = 'required'){
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'image' =>  $mode.'|image',
        ]);

        if($image = $request->file('image')){
            $filename = time().'.'.$image->extension();
            $destinationPath = public_path('/cinema_images');
            $image->move($destinationPath, $filename);
            $data['image'] = $filename;
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cinema = $this->cinemaRepository->edit($id);
        return view('admin.cinemas.edit',compact('cinema'));
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
        $this->cinemaRepository->update($id, $this->validateData($request, 'nullable'));
        toastr()->success('Cinema Updated successfully!');
        return redirect()->route('admin.cinemas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cinemaRepository->delete($id);
        toastr()->success('Cinema deleted successfully!');
        return redirect()->back();
    }
}
