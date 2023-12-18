<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PengaturanController extends Controller
{
    public function index()
    {
        $heros = HeroSection::all();
        return view('auth.pengaturan.index', compact('heros'));
    }

    public function edit($id)
    {
        $pengaturan = Pengaturan::find($id);
        return view('auth.pengaturan.edit', compact('pengaturan'));
    }

    public function update(Request $request, $id)
    {
        // Validator
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'content' => 'required',
                'img' => 'image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'title.required' => 'Judul wajib diisi.',
                'content.required' => 'Kontent wajib diisi.',
                'img.image' => 'Img berupa gambar.',
                'img.mimes' => 'Img harus berupa jpeg,png,jpg.',
                'img.max' => 'Img Maksimal 2mb',
            ],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }


        // If validator success
        DB::beginTransaction();
        try {
            $pengaturan = Pengaturan::find($id);
            if ($request['img']) {
                $path = public_path('uploads/img/');
                !is_dir($path) &&
                    mkdir($path, 0777, true);

                // Process delete old img
                $oldImg = $pengaturan->img;
                File::delete($path . $oldImg);

                // Process Uploads
                $name = Str::slug($pengaturan->title, '-') . '.' . $request->img->extension();
                ResizeImage::make($request->file('img'))
                    ->resize(1920, 1080)
                    ->save($path . $name);
            }

            $pengaturan->update([
                'title' => $request->title,
                'text' => $request->content,
                'img' => $name ?? $pengaturan->img,
            ]);

            return redirect()->route('pengaturan.index')->with('success', 'Pengaturan berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pengaturan.index')->with('fails', 'Pengaturan gagal diupdate.');
        } finally {
            DB::commit();
        }
    }
}
