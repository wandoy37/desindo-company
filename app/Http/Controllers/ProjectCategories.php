<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProjectCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project_categories = ProjectCategory::orderBy('id', 'DESC')->get();
        return view('auth.project_category.index', compact('project_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
                'title' => 'required|unique:project_categories',
            ],
            [
                'title.required' => 'Title wajib diisi.',
                'title.unique' => $request->title . ' telah terdaftar.',
            ],
        );

        // If validator fails.
        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            ProjectCategory::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-')
            ]);
            return redirect()->route('category.project.index')->with('success', 'Category ' . $request->title . ' Baru Berhasil Di Tambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('category.project.index')->with('success', 'Category ' . $request->title . ' Baru Gagal Di Tambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        DB::beginTransaction();
        try {
            $category = ProjectCategory::where('slug', $slug)->first();
            $category->delete($category);
            return redirect()->route('category.project.index')->with('success', 'Category ' . $category->title . ' Baru Berhasil Di Hapus');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('category.project.index')->with('success', 'Category ' . $category->title . ' Baru Gagal Di Hapus');
        } finally {
            DB::commit();
        }
    }
}
