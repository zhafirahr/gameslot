<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        $transactions = request()->user()->transactions()->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show transaction details
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::with('user')->with('items')->find($id);
        // Check if user is owner of transaction
        if ($transaction->user_id != request()->user()->id) {
            return redirect()->route('home')->with('error', 'You are not allowed to view this transaction');
        }
        return view('transaction.show', compact('transaction'));
    }

    /**
     * Show cart items from session
     */
    public function cart()
    {
        $cart = session()->get('cart');

        // If cart is empty
        if (empty($cart)) {
            $cart = [];
        }

        // Iterate through $cart keys and get the corresponding game
        $game = [];
        foreach ($cart as $gameId => $quantity) {
            $game[$gameId] = Game::find($gameId);
        }
        return view('transaction.cart', compact('game', 'cart'));
    }

    /**
     * Edit cart items from session
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit_cart(Request $request, $id)
    {
        // Validate quantity
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        $cart = session()->get('cart');
        $cart[$id] = $request->quantity;
        session()->put('cart', $cart);
        return redirect()->route('user.cart')->with('success', 'Cart updated successfully');
    }

    /**
     * Delete cart items from session
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete_cart($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('user.cart')->with('success', 'Cart item removed successfully');
    }

    // Checkout form handling
    public function store(Request $request)
    {
        // Get the cart items from session
        $cart = session()->get('cart');

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;

        if ($transaction->save()) {
            try {
                // Create a new transaction item for each cart item
                foreach ($cart as $id => $quantity) {
                    $game = Game::find($id);
                    $transaction_item = new TransactionItem();
                    $transaction_item->transaction_id = $transaction->id;
                    $transaction_item->title = $game->title;
                    $transaction_item->price = $game->price;
                    $transaction_item->quantity = $quantity;
                    $transaction_item->save();
                }

                // Delete the cart items
                session()->forget('cart');

                // Redirect to home with success message
                return redirect()->route('user.transaction.detail', ['id' => $transaction->id])->with('success', 'Transaction successful!');
            }
            catch (\Exception $e) {
                // Rollback the transaction
                // $transaction->delete();

                // Redirect back to the cart with an error message
                return redirect()->route('user.cart')
                    ->with('error', 'Transaction failed! Please try again.');
            }
        }

        return redirect()->route('cart');
    }
}
