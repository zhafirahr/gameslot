<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Show the form for creating a new game.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gameGenres = GameGenre::all();

        return view('games.create', compact('gameGenres'));
    }

    /**
     * Store a newly created game in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'genre' => 'required|string',
            'pegi_rating' => 'required|in:0,3,7,12,16,18',
        ]);

        // Check the genre
        $gameGenre = GameGenre::where('name', $request->genre)->first();

        if (!$gameGenre) {
            $gameGenre = GameGenre::create([
                'name' => $request->genre,
            ]);
        }

        // Handle the image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/game'), $imageName);



        // Create the game
        $game = new Game();
        $game->title = $request->title;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->pegi_rating = $request->pegi_rating;
        $game->genre_id = $gameGenre->id;
        $game->image = $imageName;

        if ($game->save()) {
            return redirect()->route('manage.game')->with('success', 'Game created successfully');
        }

        return redirect()->route('manage.game.create')->with('error', 'Something went wrong');
    }

    /**
     * Display the specified game edit form
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = Game::find($id);
        $gameGenres = GameGenre::all();

        return view('games.edit', compact('game', 'gameGenres'));
    }

    /**
     * Update the specified game in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'genre' => 'required|string',
            'pegi_rating' => 'required|in:0,3,7,12,16,18',
        ]);

        // Check the genre
        $gameGenre = GameGenre::where('name', $request->genre)->first();

        if (!$gameGenre) {
            $gameGenre = GameGenre::create([
                'name' => $request->genre,
            ]);
        }
        $game = Game::find($id);


        // Update the game
        $game->title = $request->title;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->pegi_rating = $request->pegi_rating;
        $game->genre_id = $gameGenre->id;
        // If the user has uploaded a new image
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            // Delete the old image
            $image_path = public_path('images/game/' . $game->image);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            // Handle the image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/game'), $imageName);
            $game->image = $imageName;
        }

        if ($game->save()) {
            return redirect()->route('manage.game')->with('success', 'Game updated successfully');
        }

        return redirect()->route('manage.game.edit', $id)->with('error', 'Something went wrong');
    }

    /**
     * Show the specified game.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::find($id);

        return view('games.show', compact('game'));
    }



    /**
     * Display list of game genres for admin
     *
     * @return \Illuminate\Http\Response
     */
    public function manageGameGenre()
    {
        // Get all game genres from database and return them to the view
        $gameGenres = GameGenre::all();

        return view('game-genres.manage', compact('gameGenres'));
    }

    /**
     * Display list of games for admin
     *
     * @return \Illuminate\Http\Response
     */
    public function manageGame()
    {
        // Get all games from database and return them to the view
        $games = Game::all();

        return view('games.manage', compact('games'));
    }

    /**
     * Edit game genre
     *
     * @return \Illuminate\Http\Response
     */
    public function editGameGenre($id)
    {
        // Get game genre from database and return it to the view
        $gameGenre = GameGenre::find($id);

        return view('game-genres.edit', compact('gameGenre'));
    }

    /**
     * Update game genre
     *
     * @return \Illuminate\Http\Response
     */
    public function updateGameGenre(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|unique:game_genres,name,' . $id,
        ]);

        // Get game genre from database
        $gameGenre = GameGenre::find($id);

        // Update the game genre
        $gameGenre->name = $request->name;
        if ($gameGenre->save()) {
            return redirect()->route('manage.game.genre')->with('success', 'Game genre updated successfully');
        }

        return redirect()->route('game-genres.edit', ['id' => $id])->with('error', 'Game genre could not be updated');
    }

    /**
     *  Delete game
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get game from database
        $game = Game::find($id);

        // Delete the game
        if ($game->delete()) {
            return redirect()->route('manage.game')->with('success', 'Game deleted successfully');
        }

        return redirect()->route('manage.game')->with('error', 'Game could not be deleted');
    }

    /**
     * Add game to cart
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cart($id)
    {
        // If user is not logged in, redirect to login page
        if (!Auth::check()) {
            return redirect()->route('login');
        }


        // Get game from database
        $game = Game::find($id);

        // Add the game to cart in session
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => 1
            ];
            session()->put('cart', $cart);
            return redirect()->route('home')->with('success', 'Game added to cart successfully');
        }

        if (isset($cart[$id])) {
            $cart[$id]++;
            session()->put('cart', $cart);
            return redirect()->route('home')->with('success', 'Game added to cart successfully');
        }

        $cart[$id] = 1;
        session()->put('cart', $cart);
        return redirect()->route('home')->with('success', 'Game added to cart successfully');
    }
}
