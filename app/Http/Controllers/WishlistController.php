<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Http\Requests\WishlistRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::all();
        return view('wishlists.index', compact('wishlists'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wishlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WishlistRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('wishlists', 'public');
        } else {
            $validated['image'] = null;
        }

        Wishlist::create($validated);
        return redirect()->route('wishlists.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        return view('wishlists.edit', compact('wishlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WishlistRequest $request, Wishlist $wishlist)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($wishlist->image) {
                Storage::disk('public')->delete($wishlist->image);
            }
            
            $validated['image'] = $request->file('image')->store('wishlists', 'public');
        } else {
            unset($validated['image']);
        }

        $wishlist->update($validated);
        return redirect()->route('wishlists.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        if ($wishlist->image) {
            Storage::disk('public')->delete($wishlist->image);
        }

        $wishlist->delete();
        return redirect()->route('wishlists.index');
    }
}
