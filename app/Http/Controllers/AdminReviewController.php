<?php

namespace App\Http\Controllers;

use App\Models\Review;

class AdminReviewController extends Controller
{
    /**
     * Menampilkan semua rating dan komentar.
     */
    public function index()
    {
        $reviews = Review::latest()->get();

        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Menyetujui rating dan komentar.
     */
    public function approve($id)
    {
        $review = Review::findOrFail($id);

        $review->update([
            'status' => 'approved',
        ]);

        return redirect()
            ->route('admin.review.index')
            ->with('success', 'Rating dan komentar berhasil disetujui.');
    }

    /**
     * Menghapus rating dan komentar.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()
            ->route('admin.review.index')
            ->with('success', 'Rating dan komentar berhasil dihapus.');
    }
}