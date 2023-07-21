<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('auth.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.post.create');
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
                'content' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'title.required' => 'Judul wajib diisi.',
                'content.required' => 'Konten wajib diisi.',
                'thumbnail.required' => 'Thumbnail wajib diisi.',
                'thumbnail.image' => 'Thumbnail berupa gambar.',
                'thumbnail.mimes' => 'Thumbnail harus berupa jpeg,png,jpg.',
                'thumbnail.max' => 'Thumbnail Maksimal 2mb',
            ],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        // If validator success
        DB::beginTransaction();
        try {
            // Process Uploads
            $path = public_path('thumbnail/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $name = time() . '.' . $request->thumbnail->extension();
            ResizeImage::make($request->file('thumbnail'))
                ->resize(1920, 1080)
                ->save($path . $name);

            Post::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-') . '-' . date('d-m-Y'),
                'thumbnail' => $name,
                'content' => $request->content,
            ]);

            return redirect()->route('post.index')->with('success', 'Postingan baru berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('post.index')->with('fails', 'Postingan baru gagal ditambahkan.');
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
    public function edit(string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('auth.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->first();


        if ($request['thumbnail']) {
            // Validator Opsi 1
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'content' => 'required',
                    'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
                ],
                [
                    'title.required' => 'Judul wajib diisi.',
                    'content.required' => 'Konten wajib diisi.',
                    'thumbnail.image' => 'Thumbnail berupa gambar.',
                    'thumbnail.mimes' => 'Thumbnail harus berupa jpeg,png,jpg.',
                    'thumbnail.max' => 'Thumbnail Maksimal 2mb',
                ],
            );
        } else {
            // Validator
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'content' => 'required',
                ],
                [
                    'title.required' => 'Judul wajib diisi.',
                    'content.required' => 'Konten wajib diisi.',
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
            if ($request['thumbnail']) {
                $path = public_path('thumbnail/');
                !is_dir($path) &&
                    mkdir($path, 0777, true);

                // Process delete old thumbnail
                $oldThumbnail = $post->thumbnail;
                File::delete($path . $oldThumbnail);

                // Process Uploads
                $name = time() . '.' . $request->thumbnail->extension();
                ResizeImage::make($request->file('thumbnail'))
                    ->resize(1920, 1080)
                    ->save($path . $name);
            }


            $post->update([
                'title' => $request->title,
                'slug' => $post->slug,
                'thumbnail' => $name ?? $post->thumbnail,
                'content' => $request->content,
            ]);

            return redirect()->route('post.index')->with('success', 'Postingan berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('post.index')->with('fails', 'Postingan gagal diupdate.');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        DB::beginTransaction();
        try {
            $post = Post::where('slug', $slug)->first();
            $path = public_path('thumbnail/');
            File::delete($path . $post->thumbnail);

            $post->delete($post);
            return redirect()->route('post.index')->with('success', 'Postingan ' . $post->title . ' telah dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('post.index')->with('fails', 'Postingan ' . $post->title . ' gagal dihapus.');
        } finally {
            DB::commit();
        }
    }
}
