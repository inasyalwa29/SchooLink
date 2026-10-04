<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Menyimpan rating dan komentar dari pengunjung.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'komentar' => ['required', 'string', 'max:1000'],
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 100 karakter.',
            'rating.required' => 'Silakan pilih rating.',
            'rating.min' => 'Rating minimal 1 bintang.',
            'rating.max' => 'Rating maksimal 5 bintang.',
            'komentar.required' => 'Komentar wajib diisi.',
            'komentar.max' => 'Komentar maksimal 1000 karakter.',
        ]);

        Review::create([
            'nama' => $validated['nama'],
            'rating' => $validated['rating'],
            'komentar' => $validated['komentar'],
            'status' => 'pending',
        ]);

        return back()->with(
            'review_success',
            'Terima kasih! Rating dan komentar kamu berhasil dikirim dan menunggu persetujuan admin.'
        );
    }
}