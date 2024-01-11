<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BajuController extends Controller
{

    public function index()
    {

        $query = Baju::latest();
        if (request('search')) {
            $query->where('type', 'like', '%' . request('search') . '%')
                ->orWhere('price', 'like', '%' . request('search') . '%');
        }
        $bajus = $query->paginate(6)->withQueryString();
        return view('homepage', compact('bajus'));
    }

    public function detail($id)
    {
        $baju = Baju::find($id);
        return view('detail', compact('baju'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('input', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'string', 'max:255', Rule::unique('bajus', 'id')],
            'type' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|string',
            'fabric' => 'required|string',
            'color' => 'required|string',
            'foto_sampul' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Jika validasi gagal, kembali ke halaman input dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('bajus/create')
                ->withErrors($validator)
                ->withInput();
        }

        $randomName = Str::uuid()->toString();
        $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
        $fileName = $randomName . '.' . $fileExtension;

        // Simpan file foto ke folder public/images
        $request->file('foto_sampul')->move(public_path('images'), $fileName);
        // Simpan data ke table bajus
        Baju::create([
            'id' => $request->id,
            'type' => $request->type,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'fabric' => $request->fabric,
            'color' => $request->color,
            'foto_sampul' => $fileName,
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function data()
    {
        $bajus = Baju::latest()->paginate(10);
        return view('data-bajus', compact('bajus'));
    }

    public function edit($id)
    {
        $baju = Baju::find($id);
        $categories = Category::all();
        return view('form-edit', compact('baju', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|string',
            'fabric' => 'required|string',
            'color' => 'required|string',
            'foto_sampul' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect("/bajus/edit/{$id}")
                ->withErrors($validator)
                ->withInput();
        }

        // Ambil data movie yang akan diupdate
        $baju = Baju::findOrFail($id);

        // Jika ada file yang diunggah, simpan file baru
        if ($request->hasFile('foto_sampul')) {
            $randomName = Str::uuid()->toString();
            $fileExtension = $request->file('foto_sampul')->getClientOriginalExtension();
            $fileName = $randomName . '.' . $fileExtension;

            // Simpan file foto ke folder public/images
            $request->file('foto_sampul')->move(public_path('images'), $fileName);

            // Hapus foto lama jika ada
            if (File::exists(public_path('images/' . $baju->foto_sampul))) {
                File::delete(public_path('images/' . $baju->foto_sampul));
            }

            // Update record di database dengan foto yang baru
            $baju->update([
                'type' => $request->type,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'fabric' => $request->fabric,
                'color' => $request->color,
                'foto_sampul' => $fileName,
            ]);
        } else {
            // Jika tidak ada file yang diunggah, update data tanpa mengubah foto
            $baju->update([
                'type' => $request->type,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'fabric' => $request->fabric,
                'color' => $request->color,
            ]);
        }

        return redirect('/bajus/data')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $baju = Baju::findOrFail($id);
        // Delete the movie's photo if it exists
        if (File::exists(public_path('images/' . $baju->foto_sampul))) {
            if ($baju->foto_sampul != 'default.jpg') {
                File::delete(public_path('images/' . $baju->foto_sampul));
            }
        }
        // Delete the movie record from the database
        $baju->delete();
        return redirect('/bajus/data')->with('success', 'Data berhasil dihapus');
    }
}
