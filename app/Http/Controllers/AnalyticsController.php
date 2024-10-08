<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;


class AnalyticsController extends Controller
{
    public function index()
    {
        // Get today's start and end date
        $todayStart = now()->subDay();
        // Recent Items
        $recentItems = Item::where('created_at', '>=', $todayStart)->get();
        $recentAdditionsQuantity = $recentItems->sum('quantity');
        // Total Items
        $totalItems = Item::sum('quantity');
        // Operating Items
        $operatingItems = Item::where('condition', 'Operating')->sum('quantity');
        // Not Operating Items
        $notOperatingItems = Item::where('condition', 'Not Operating')->sum('quantity');
        // Items by Category
        $itemsByCategory = Item::selectRaw('name, SUM(quantity) as total_quantity')
            ->groupBy('name')
            ->pluck('total_quantity', 'name');
        // Items by Location
        $itemsByLocation = Item::selectRaw('location, SUM(quantity) as total_quantity')
            ->groupBy('location')
            ->pluck('total_quantity', 'location');
        return view('analytics', compact('totalItems', 'operatingItems', 'notOperatingItems', 'recentAdditionsQuantity', 'itemsByCategory', 'itemsByLocation'));
    }

    public function index_user()
    {
        // Get today's start and end date
        $todayStart = now()->subDay();
        // Recent Items
        $recentItems = Item::where('created_at', '>=', $todayStart)->get();
        $recentAdditionsQuantity = $recentItems->sum('quantity');
        // Total Items
        $totalItems = Item::sum('quantity');
        // Operating Items
        $operatingItems = Item::where('condition', 'Operating')->sum('quantity');
        // Not Operating Items
        $notOperatingItems = Item::where('condition', 'Not Operating')->sum('quantity');
        // Items by Category
        $itemsByCategory = Item::selectRaw('name, SUM(quantity) as total_quantity')
            ->groupBy('name')
            ->pluck('total_quantity', 'name');
        // Items by Location
        $itemsByLocation = Item::selectRaw('location, SUM(quantity) as total_quantity')
            ->groupBy('location')
            ->pluck('total_quantity', 'location');
        return view('analytics', compact('totalItems', 'operatingItems', 'notOperatingItems', 'recentAdditionsQuantity', 'itemsByCategory', 'itemsByLocation'));
    }
    public function index_admin()
    {
        $admin = auth()->guard('admin')->user(); // Get the currently authenticated admin

        // Get today's start date
        $todayStart = now()->startOfDay();

        // Recent Items
        $recentItems = Item::where('admin_id', $admin->id)
            ->where('created_at', '>=', $todayStart)
            ->get();
        $recentAdditionsQuantity = $recentItems->sum('quantity');

        // Total Items
        $totalItems = Item::where('admin_id', $admin->id)->sum('quantity');

        // Operating Items
        $operatingItems = Item::where('admin_id', $admin->id)
            ->where('condition', 'Operating')
            ->sum('quantity');

        // Not Operating Items
        $notOperatingItems = Item::where('admin_id', $admin->id)
            ->where('condition', 'Not Operating')
            ->sum('quantity');

        // Items by Category
      $itemsByCategory = Item::where('admin_id', $admin->id)
       ->selectRaw('name, SUM(quantity) as total_quantity')
          ->groupBy('name')
          ->pluck('total_quantity', 'name');

        // Items by Location
      $itemsByLocation = Item::where('admin_id', $admin->id)
      ->selectRaw('location, SUM(quantity) as total_quantity')
            ->groupBy('location')
            ->pluck('total_quantity', 'location');

        //Items bu User
        $itemsByUser = Item::where('admin_id', $admin->id)
            ->join('users', 'items.user_id', '=', 'users.id')
            ->selectRaw('users.name as user_name, SUM(items.quantity) as total_quantity')
            ->groupBy('users.name')
            ->pluck('total_quantity', 'user_name');

        return view('admin.dashboard', compact(
            'totalItems',
            'operatingItems',
            'notOperatingItems',
            'recentAdditionsQuantity',
            'itemsByCategory',
            'itemsByLocation',
            'itemsByUser'
        ));
    }


}



