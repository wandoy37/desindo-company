<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanans = Layanan::orderBy('id', 'DESC')->get();
        return view('auth.layanan.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validator
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'Nama layanan wajib diisi.',
            ],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            Layanan::create([
                'title' => $request->title,
            ]);

            return redirect()->route('layanan.index')->with('success', 'layanan baru berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('layanan.index')->with('fails', 'layanan baru gagal ditambahkan.');
        } finally {
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $layanan = Layanan::find($id);
        return view('auth.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $layanan = Layanan::find($id);


        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
            ],
            [
                'title.required' => 'Nama layanan wajib diisi.',
            ],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            $layanan->update([
                'title' => $request->title,
            ]);

            return redirect()->route('layanan.index')->with('success', 'Layanan berhasil di update.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('layanan.index')->with('fails', 'Layanan gagal di update.');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $layanan = Layanan::find($id);
            $layanan->delete($layanan);
            return redirect()->route('layanan.index')->with('success', 'Layanan ' . $layanan->title . ' telah dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('layanan.index')->with('fails', 'Layanan ' . $layanan->title . ' gagal dihapus.');
        } finally {
            DB::commit();
        }
    }
}
