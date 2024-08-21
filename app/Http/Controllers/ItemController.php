<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Item;
use App\Models\User;
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
            'remarks' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('condition') === 'Not Operating' && !$value) {
                        $fail('Remarks are required when the condition is Not Operating.');
                    }
                },
                'in:BER,For Turn In'
            ],
            'po_number' => 'required',
            'dealer' => 'required',
            'mode_of_procurement' => 'required|in:Capital Outlay,Capitalization,Semi Expandable,Transfer,Donation,Negotiated',
            'date_acquired' => 'required',
            'date_issued' => 'required',
        ]);

        $user = Auth::user();
        $user->user_items()->create($data);

        // Log the activity
        Activity::create([
            'user_id' => $user->id,
            'description' => 'added an item: ' . $data['name'],
        ]);

        return redirect('/item')->with('success', 'Item added successfully!');
    }


    /**
     * Display the specified resource.
     */

    public function show(Item $items)
    {
        //
    }
    public function print()
    {
        $items = Item::all(); // Or use any method to get the items you want to print
        $user = Auth::user();
        Activity::create([
            'user_id' => $user->id,
            'description' => 'printed the inventory',
        ]);
        return view('print_inventory', compact('items'));
    }

    public function adminInventories_print(Request $request)
    {
        $accountname_with_accountcode = $request->input('accountname_with_accountcode');

        if ($accountname_with_accountcode) {
            $items = Item::where('accountname_with_accountcode', $accountname_with_accountcode)->get();
        } else {
            $items = Item::all();
        }
         // Assuming the User model has a relationship 'inventories' with the Item model
        return view('admin.print_all_inventories', compact( 'items'));
    }


    //only shows the user's added items
    public function user_items()
    {
        $user = Auth::user();
        $items = Item::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();

        return view('index', compact('items'));
    }

    public function showAllInventories()
    {
        $items = Item::orderBy('updated_at', 'desc')->get();

        return view('admin.inventories', compact('items'));
    }


    /**
     * Show the form for editing the specified resource.
     */
/**  public function edit($id)
    {
        $items = Item::findOrFail($id);
        return view('edit', compact('items'));
    }

    /**
     * Update the specified resource in storage.
     */
 /**  public function update(Request $request, Item $item)
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
        $user = Auth::user();
        $user->user_items()->create($data);

        Activity::create([
            'user_id' => auth()->id(),
            'description' => 'edited an item: ' . $data['name'],
        ]);

        return redirect(route('dashboard'))->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
/** public function destroy($id)
    {
        // Retrieve the item to be deleted
        $item = Item::findOrFail($id);

        // Log the activity before deleting the item
        Activity::create([
            'user_id' => auth()->id(),
            'description' => 'deleted an item: ' . $item->name,
        ]);

        // Delete the item
        $item->delete();

        return redirect(route('dashboard'))->with('success', 'Item deleted successfully!');
    }
*/

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('admin.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'property_number' => 'required',
            'unit' => 'required',
            'unit_value' => 'required',
            'quantity' => 'required',
            'location' => 'required',
            'condition' => 'required|in:Operating,Not Operating',
            'remarks' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('condition') === 'Not Operating' && !$value) {
                        $fail('Remarks are required when the condition is Not Operating.');
                    }
                },
                'in:BER,For Turn In'
            ],
            'po_number' => 'required',
            'dealer' => 'required',
            'mode_of_procurement' => 'required|in:Capital Outlay,Capitalization,Semi Expandable,Transfer,Donation,Negotiated',
            'accountname_with_accountcode' => 'required|in:ICT/1-06-05-030,Comms/1-06-05-070,Office Equipment/1-06-05-020,Machinery/1-06-05-010,Other Structures/1-06-04-990,BLDG/1-06-04-010,Comms Network/1-06-03-060,Power Supply System/1-06-03-050,Construction and Heavy Equipment/1-06-05-080,Firearms(Regular)/1-06-05-100,Firearms(Modernization)/1-06-05-100,Technical & Scientific Equipment/1-06-05-140,Vehicles/1-06-06-010,Vehicles(Modernization)/1-06-06-010,Furniture/1-06-07-010,Other property plant & equipment/1-06-99-990,Computer Software/1-08-01-020',
            'date_acquired' => 'required',
            'date_issued' => 'required',

            // add other validation rules as needed
        ]);

        $item->update($request->all());

        return redirect()->route('admin.inventories')->with('success', 'Item updated successfully');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect(route('admin.inventories'))->with('success', 'Item updated successfully!');
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

    public function admin_search(Request $request)
    {
        $query = $request->input('query');
        $perPage = $request->input('per_page', 10); // Default to 10 if not specified

        $users = User::where('name', 'LIKE', "%$query%")
            ->paginate($perPage);

        return view('admin.dashboard', compact('users'));
    }

    public function adminInventories_search(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $query = $request->input('query', '');

        $items = Item::query();

        if ($query) {
            $items->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%")
                    ->orWhere('brand', 'LIKE', "%$query%")
                    ->orWhere('property_number', 'LIKE', "%$query%")
                    ->orWhere('location', 'LIKE', "%$query%")
                    ->orWhere('dealer', 'LIKE', "%$query%");
            });
        }

        $items = $items->orderBy('updated_at', 'desc')->paginate($perPage);

        return view('admin.inventories', compact('items', 'query', 'perPage'));
    }

    public function adminInventories_dropdown(Request $request)
    {
        $accountCode = $request->input('accountname_with_accountcode');
        $query = Item::orderBy('updated_at', 'desc');
        if ($accountCode) {
            $query->where('accountname_with_accountcode', $accountCode);
        }
        $items = $query->get();

        return view('admin.inventories', compact('items'));
    }



    public function adminUsers_dropdown(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not specified
        $users = User::paginate($perPage);

        return view('admin.users', compact('users'));
    }

    public function adminUsers_search(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not specified
        $query = $request->input('query', ''); // Default to an empty string if not specified

        $users = User::with('user_items');

        if ($query) {
            $users->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%")
                    ->orWhere('email', 'LIKE', "%$query%");
            });
        }

        $users = $users->orderBy('updated_at', 'desc')->paginate($perPage);

        return view('admin.users', compact('users', 'query', 'perPage'));
    }

}
