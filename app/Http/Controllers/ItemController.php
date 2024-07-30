<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(10);

        return view('index', ['items' => $items]);
    }


    public function dropdown(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not specified
        $items = Item::paginate($perPage);

        return view('index', compact('items'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'property_number' => 'required',
            'unit' => 'required',
            'unit_value' => 'required',
            'quantity' => 'required',
            'location' => 'required',
            'condition' => 'required|in:Operating,Not Operating',
            'remarks' => 'required|in:BER,For Turn In',
            'po_number' => 'required',
            'dealer' => 'required',
            'date_acquired' => 'required',
        ]);

        $user = Auth::user();
        $user->user_items()->create($data);

        return redirect('/item')->with('success', 'Item added successfully!');
    }

    /**
     * Display the specified resource.
     */

    //pwede ni gamiton for admin, click user's name then ma show ang iyang items

    public function show(Item $items)
    {
        //
    }


    //only shows the user's added items
    public function user_items()
    {
        $user = Auth::user();
        $items = Item::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();

        return view('index', compact('items'));
    }

    public function admin_dashboard()
    {
        $items = Item::orderBy('updated_at', 'desc')->get();

        return view('admin.dashboard', compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $items = Item::findOrFail($id);
        return view('edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'property_number' => 'required',
            'unit' => 'required',
            'unit_value' => 'required',
            'quantity' => 'required',
            'location' => 'required',
            'condition' => 'required|in:Operating,Not Operating',
            'remarks' => 'required|in:BER,For Turn In',
            'po_number' => 'required',
            'dealer' => 'required',
            'date_acquired' => 'required',
        ]);

//        $items = Item::findOrFail($id);
        $item->update($data);

        return redirect('/items')->with('success', 'Item updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        $items->delete();

        return redirect('/items')->with('success', 'Item deleted successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $perPage = $request->input('per_page', 10); // Default to 10 if not specified

        $items = Item::where('name', 'LIKE', "%$query%")
            ->orWhere('brand', 'LIKE', "%$query%")
            ->orWhere('property_number', 'LIKE', "%$query%")
            ->orWhere('location', 'LIKE', "%$query%")
            ->orWhere('dealer', 'LIKE', "%$query%")
            ->paginate($perPage);

        return view('index', compact('items'));
    }
}
