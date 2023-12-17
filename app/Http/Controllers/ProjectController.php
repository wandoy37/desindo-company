<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->get();
        return view('auth.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProjectCategory::all();
        return view('auth.project.create', compact('categories'));
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
                'description' => 'required',
                'category' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'title.required' => 'Nama proyek wajib diisi.',
                'category.required' => 'Kategori proyek wajib diisi.',
                'description.required' => 'Keterangan proyek wajib diisi.',
                'image.required' => 'Foto proyek wajib diupload.',
                'image.image' => 'Foto proyek berupa gambar.',
                'image.mimes' => 'Foto proyek harus berupa jpeg,png,jpg.',
                'image.max' => 'Foto proyek Maksimal 2mb',
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
            $path = public_path('projects/');
            !is_dir($path) &&
                mkdir($path, 0777, true);

            $name = time() . '.' . $request->image->extension();
            ResizeImage::make($request->file('image'))
                ->resize(1920, 1080)
                ->save($path . $name);

            Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $name,
                'category_id' => $request->category,
            ]);

            return redirect()->route('project.index')->with('success', 'Proyek baru berhasil ditambahkan.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('project.index')->with('fails', 'Proyek baru gagal ditambahkan.');
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
        $project = Project::find($id);
        $categories = ProjectCategory::all();
        return view('auth.project.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        // Validator
        if ($request['image']) {
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'description' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'category' => 'required',
                ],
                [
                    'title.required' => 'Nama proyek wajib diisi.',
                    'category.required' => 'Kategori proyek wajib diisi.',
                    'description.required' => 'Keterangan proyek wajib diisi.',
                    'image.required' => 'Foto proyek wajib diupload.',
                    'image.image' => 'Foto proyek berupa gambar.',
                    'image.mimes' => 'Foto proyek harus berupa jpeg,png,jpg.',
                    'image.max' => 'Foto proyek Maksimal 2mb',
                ],
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'description' => 'required',
                ],
                [
                    'title.required' => 'Nama proyek wajib diisi.',
                    'description.required' => 'Keterangan proyek wajib diisi.',
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
                $path = public_path('projects/');
                !is_dir($path) &&
                    mkdir($path, 0777, true);

                // Process delete old Image
                $oldImage = $project->image;
                File::delete($path . $oldImage);

                // Process Uploads
                $name = time() . '.' . $request->image->extension();
                ResizeImage::make($request->file('image'))
                    ->resize(1920, 1080)
                    ->save($path . $name);
            }


            $project->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $name ?? $project->image,
                'category_id' => $request->category,
            ]);

            return redirect()->route('project.index')->with('success', 'Proyek berhasil di update.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('project.index')->with('fails', 'Proyek gagal di update.');
        } finally {
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $project = Project::find($id);
            $path = public_path('projects/');
            File::delete($path . $project->image);

            $project->delete($project);
            return redirect()->route('project.index')->with('success', 'Proyek ' . $project->title . ' telah dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('project.index')->with('fails', 'Proyek ' . $project->title . ' gagal dihapus.');
        } finally {
            DB::commit();
        }
    }
}
