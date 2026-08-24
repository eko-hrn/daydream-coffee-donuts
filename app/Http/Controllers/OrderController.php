<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:150',
            'customer_phone' => 'required|string|max:30',
            'customer_email' => 'nullable|email|max:150',
            'quantity' => 'required|integer|min:1|max:100',
            'note' => 'nullable|string|max:1000',
        ], [
            'product_id.required' => 'Produk wajib dipilih.',
            'product_id.exists' => 'Produk tidak ditemukan.',
            'customer_name.required' => 'Nama customer wajib diisi.',
            'customer_phone.required' => 'Nomor HP wajib diisi.',
            'customer_email.email' => 'Format email tidak valid.',
            'quantity.required' => 'Jumlah order wajib diisi.',
            'quantity.integer' => 'Jumlah order harus berupa angka.',
            'quantity.min' => 'Jumlah order minimal 1.',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        $totalPrice = $product->price * $validated['quantity'];

        Order::create([
            'product_id' => $product->id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_email' => $validated['customer_email'] ?? null,
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'note' => $validated['note'] ?? null,
            'status' => 'Pending',
        ]);

        return back()->with('order_success', 'Order berhasil dikirim. Admin akan segera memproses pesanan Anda.');
    }
}