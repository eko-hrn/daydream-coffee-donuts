<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = [
            'Donut',
            'Coffee',
            'Bakery',
            'Beverage',
            'Dessert',
            'Package',
        ];

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
            'image_url' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_best_seller' => 'nullable',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'category.required' => 'Kategori produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'image_url.required' => 'Gambar produk wajib diupload.',
            'image_url.image' => 'File harus berupa gambar.',
            'image_url.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image_url.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $imageName = null;

        if ($request->hasFile('image_url')) {
            $imagePath = public_path('images');

            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0755, true);
            }

            $image = $request->file('image_url');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();

            $imageName = time() . '_' . Str::slug($originalName) . '.' . $extension;

            $image->move($imagePath, $imageName);
        }

        Product::create([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image_url' => $imageName,
            'is_best_seller' => $request->has('is_best_seller') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Data produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $categories = [
            'Donut',
            'Coffee',
            'Bakery',
            'Beverage',
            'Dessert',
            'Package',
        ];

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'category' => 'required|string|max:100',
            'price' => 'required|integer|min:0',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_best_seller' => 'nullable',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'category.required' => 'Kategori produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'image_url.image' => 'File harus berupa gambar.',
            'image_url.mimes' => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image_url.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $imageName = $product->image_url;

        if ($request->hasFile('image_url')) {
            $imagePath = public_path('images');

            if (!File::exists($imagePath)) {
                File::makeDirectory($imagePath, 0755, true);
            }

            if ($product->image_url && File::exists(public_path('images/' . $product->image_url))) {
                File::delete(public_path('images/' . $product->image_url));
            }

            $image = $request->file('image_url');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();

            $imageName = time() . '_' . Str::slug($originalName) . '.' . $extension;

            $image->move($imagePath, $imageName);
        }

        $product->update([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image_url' => $imageName,
            'is_best_seller' => $request->has('is_best_seller') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Data produk berhasil diperbarui.');
    }

    public function cetakPdf()
    {
        $products = Product::latest()->get();

        $pdf = Pdf::loadView('admin.products.pdf.all', compact('products'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('data-products-jco.pdf');
    }

    public function cetakPdfById($id)
    {
        $product = Product::findOrFail($id);

        $pdf = Pdf::loadView('admin.products.pdf.detail', compact('product'))
            ->setPaper('a4', 'portrait');

        return $pdf->stream('product-' . $product->id . '-' . Str::slug($product->name) . '.pdf');
    }

    public function destroy(Product $product)
    {
        if ($product->image_url && File::exists(public_path('images/' . $product->image_url))) {
            File::delete(public_path('images/' . $product->image_url));
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Data produk berhasil dihapus.');
    }
}