<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;
use App\Models\ProgramKeahlian;
use App\Models\Ekstrakurikuler;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $schoolProfile = SchoolProfile::first();

        $programKeahlians = ProgramKeahlian::latest()->get();

        $ekstrakurikulers = Ekstrakurikuler::latest()->get();

        $beritas = Berita::latest()->get();

        $galeri = Galeri::latest()->get();

        $reviews = Review::latest()->get();

        return view('welcome', compact(
            'schoolProfile',
            'programKeahlians',
            'ekstrakurikulers',
            'beritas',
            'galeri',
            'reviews'
        ));
    }
}