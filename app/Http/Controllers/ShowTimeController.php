<?php

namespace App\Http\Controllers;

use App\Repositories\ShowtimeRepository;
use Illuminate\Http\Request;

class ShowTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $showtimeRepository;

    public function __construct(ShowtimeRepository $showtimeRepository){
        $this->showtimeRepository = $showtimeRepository;
    }


    public function index()
    {
        $shows = $this->showtimeRepository->all();
        return view('admin.showtimes.index', compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cinemas = $this->showtimeRepository->getCinema();
        $movies =  $this->showtimeRepository->getMovie();
        return view('admin.showtimes.create', compact('cinemas','movies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->showtimeRepository->store($this->validateData($request));
        toastr()->success('Showtime added successfully!');
        return redirect()->route('admin.showtimes.index');
    }

    private function validateData(Request $request){
        $data = $request->validate([
            'cinema_id' => 'required|exists:cinemas,id',
            'movie_id' => 'required|exists:movies,id',
            'datetime' => 'required|string',
        ]);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function show(ShowTime $showTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cinemas = $this->showtimeRepository->getCinema();
        $movies = $this->showtimeRepository->getMovie();
        $showtime = $this->showtimeRepository->edit($id);
        return view('admin.showtimes.edit',compact('cinemas','movies','showtime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->showtimeRepository->update($id, $this->validateData($request, 'nullable'));
        toastr()->success('Showtime Updated successfully!');
        return redirect()->route('admin.showtimes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShowTime  $showTime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->showtimeRepository->delete($id);
        toastr()->success('Showtime deleted successfully!');
        return redirect()->back();
    }
}
