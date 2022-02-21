<?php

namespace App\Http\Controllers\admin;

use App\Models\Tiket;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/tiket', [
            'tikets' => Tiket::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/createTiket', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'organizer' => 'required|max:255',
            'category_id' => 'required',
            'location' => 'required|max:255',
            'image' => 'image|file|max:2048',
            'date' => 'required|max:255',
            'time' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('tiket-image');
        }

        Tiket::create($validatedData);

        return redirect('/tiket')->with('success', 'Berhasil Di Tambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function show(Tiket $tiket)
    {
        return view('dashboard.detailTiket', [
            'tiket' => $tiket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function edit(Tiket $tiket)
    {
        return view('/dashboard/editTiket', [
            'tiket' => $tiket,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiket $tiket)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'organizer' => 'required|max:255',
            'category_id' => 'required',
            'location' => 'required|max:255',
            'image' => 'image|file|max:2048',
            'date' => 'required|max:255',
            'time' => 'required|max:255',
            'price' => 'required|max:255',
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('tiket-image');
        }

        Tiket::where('id', $tiket->id)
            ->update($validatedData);

        return redirect('/tiket')->with('success', 'Post has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tiket $tiket)
    {
        if($post->image) {
                Storage::delete($post->image);
            }
            
        Tiket::destroy($tiket->id);

        return redirect('/tiket')->with('success', 'Berhasil di Hapus');
    }
}
