<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Facades\File;

class HeroSectionController extends Controller
{
    public function edit($id)
    {
        $hero = HeroSection::find($id);
        return view('auth.hero.edit', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        // Validator
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ],
            [
                'image.required' => 'Image wajib diisi.',
                'image.image' => 'Image berupa gambar.',
                'image.mimes' => 'Image harus berupa jpeg,png,jpg.',
            ],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            $hero = HeroSection::find($id);
            // Process Uploads
            $path = public_path('hero/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            // Process delete old thumbnail
            $oldImage = $hero->image;
            File::delete($path . $oldImage);

            // Process Uploads
            $name = 'hero-carousel-' . $hero->id . '.' . $request->image->extension();
            ResizeImage::make($request->file('image'))
                ->resize(1920, 1080)
                ->save($path . $name);

            $hero->update([
                'image' => $name,
            ]);

            return redirect()->route('pengaturan.index')->with('success', 'Hero baru berhasil di update.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('pengaturan.index')->with('fails', 'Hero baru gagal di update.');
        } finally {
            DB::commit();
        }
    }
}
