<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userAge = -1;
        if(auth()->user()){
            $userAge = (int) date('Y') - (int) date('Y', strtotime(auth()->user()->dob));
        }
        // Get user age from DOB, if not there, set to 20
        if ($userAge < 0) {
            $userAge = 20;
        }

        // Get all games below user age and paginate
        $games = Game::where('pegi_rating', '<=', $userAge)->paginate(10);

        $item_count = $games->count();
        $per_grid = 5;
        return view('home', compact('item_count', 'per_grid', 'games'));
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $games = Game::where('title', 'like', '%' . $keyword . '%')->paginate(10);
        $item_count = $games->count();
        $per_grid = 5;
        return view('home', compact('item_count', 'per_grid', 'games'));
    }
}
