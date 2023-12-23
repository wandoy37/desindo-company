<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $projects = Project::all();
        return view('auth.dashboard.index', compact('posts', 'projects'));
    }

    public function about()
    {
        $about = About::find(1);
        return view('auth.about', compact('about'));
    }

    public function aboutUpdate(Request $request)
    {
        $about = About::find(1);
        // Validator
        if ($request['image']) {
            $validator = Validator::make(
                $request->all(),
                [
                    'content' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'youtube' => 'required',
                    'address' => 'required',
                    'email' => 'required',
                    'number_phone' => 'required',
                    'maps' => 'required',
                ],
                [
                    'content.required' => 'Kontent wajib diisi.',
                    'image.required' => 'Foto proyek wajib diupload.',
                    'image.image' => 'Foto proyek berupa gambar.',
                    'image.mimes' => 'Foto proyek harus berupa jpeg,png,jpg.',
                    'image.max' => 'Foto proyek Maksimal 2mb',
                    'youtube.required' => 'Link youtube wajib diisi.',
                    'address.required' => 'Link address wajib diisi.',
                    'email.required' => 'Link email wajib diisi.',
                    'number_phone.required' => 'Link number_phone wajib diisi.',
                    'maps.required' => 'Link maps wajib diisi.',
                ],
            );
        } elseif ($request['logo']) {
            $validator = Validator::make(
                $request->all(),
                [
                    'content' => 'required',
                    'youtube' => 'required',
                    'address' => 'required',
                    'email' => 'required',
                    'number_phone' => 'required',
                    'maps' => 'required',
                    'logo' => 'required|image|mimes:jpeg,png,jpg',
                ],
                [
                    'content.required' => 'Kontent wajib diisi.',
                    'youtube.required' => 'Link youtube wajib diisi.',
                    'address.required' => 'Link address wajib diisi.',
                    'email.required' => 'Link email wajib diisi.',
                    'number_phone.required' => 'Link number_phone wajib diisi.',
                    'maps.required' => 'Link maps wajib diisi.',
                    'logo.required' => 'Logo perusahaan wajib diupload.',
                    'logo.image' => 'Logo perusahaan berupa gambar.',
                    'logo.mimes' => 'Logo perusahaan harus berupa jpeg,png,jpg.',
                ],
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'content' => 'required',
                    'youtube' => 'required',
                    'address' => 'required',
                    'email' => 'required',
                    'number_phone' => 'required',
                    'maps' => 'required',
                ],
                [
                    'content.required' => 'Kontent wajib diisi.',
                    'youtube.required' => 'Link youtube wajib diisi.',
                    'address.required' => 'Link address wajib diisi.',
                    'email.required' => 'Link email wajib diisi.',
                    'number_phone.required' => 'Link number_phone wajib diisi.',
                    'maps.required' => 'Link maps wajib diisi.',
                ],
            );
        }

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            if ($request['image']) {
                $path = public_path('about/');
                !is_dir($path) &&
                    mkdir($path, 0777, true);

                // Process delete old Image
                $oldImage = $about->image;
                File::delete($path . $oldImage);

                // Process Uploads
                $name = time() . '.' . $request->image->extension();
                ResizeImage::make($request->file('image'))
                    ->resize(770, 600)
                    ->save($path . $name);
            }

            if ($request['logo']) {
                $path = public_path('about/');
                !is_dir($path) &&
                    mkdir($path, 0777, true);

                // Process delete old logo
                $oldLogo = $about->logo;
                File::delete($path . $oldLogo);

                // Process Uploads
                $logo = time() . '.' . $request->logo->extension();
                ResizeImage::make($request->file('logo'))
                    ->resize(108, 108)
                    ->save($path . $logo);
            }

            $about->update([
                'content' => $request->content,
                'image' => $name ?? $about->image,
                'youtube' => $request->youtube,
                'address' => $request->address,
                'email' => $request->email,
                'number_phone' => $request->number_phone,
                'maps' => $request->maps,
                'logo' => $logo ?? $about->logo,
            ]);

            return redirect()->route('dashboard.index')->with('success', 'Informasi Perusahaan berhasil di update.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('dashboard.index')->with('fails', 'Informasi Perusahaan gagal di update.');
        } finally {
            DB::commit();
        }
    }
}
