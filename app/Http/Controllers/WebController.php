<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ShowtimeRepository;

class WebController extends Controller
{
    private $showtimeRepository;

    public function __construct(ShowtimeRepository $showtimeRepository){
        $this->showtimeRepository = $showtimeRepository;
    }

    public function index(){
        $shows = $this->showtimeRepository->all();
        return view('welcome', compact('shows'));
    }
}
