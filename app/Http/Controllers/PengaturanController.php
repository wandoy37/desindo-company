<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ResizeImage;

class PengaturanController extends Controller
{
    public function index()
    {
        $pengaturans = Pengaturan::all();
        return view('auth.pengaturan.index', compact('pengaturans'));
    }

    public function edit($id)
    {
        $pengaturan = Pengaturan::find($id);
        return view('auth.pengaturan.edit', compact('pengaturan'));
    }

    public function update(Request $request, $id)
    {
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

        $newUpdate = [
            'title' => $request->title,
            'text' => $request->text,
            'img' => $name ?? null,
        ];

        $pengaturan->update($newUpdate);

        return 'success';
    }
}
