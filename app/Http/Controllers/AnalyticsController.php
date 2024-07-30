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
}
