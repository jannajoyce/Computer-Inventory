<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $totalUsers = User::count();
        $itemsAddedToday = Item::whereDate('created_at', Carbon::today())->count();
//        $totalItems = Item::count();
        $totalQuantityItems = Item::sum('quantity');
        $notOperatingItems = Item::where('condition', 'Not Operating')->count();
        $operatingItems = Item::where('condition', 'Operating')->count();
        $itemsByCategory = Item::selectRaw('name, SUM(quantity) as total_quantity')->groupBy('name')->pluck('total_quantity', 'name');
        $itemsByLocation = Item::selectRaw('location, SUM(quantity) as total_quantity')->groupBy('location')->pluck('total_quantity', 'location');

        return view('admin.dashboard', compact( 'totalUsers', 'itemsAddedToday', 'totalQuantityItems',
                                                        'operatingItems', 'notOperatingItems', 'itemsByCategory','itemsByLocation' ));
    }


    public function usersIndex()
    {
        $users = User::with('user_items')->paginate(10); // Eager load items with users

        return view('admin.users',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
