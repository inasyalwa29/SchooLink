<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Menampilkan semua berita di halaman admin
     * sekaligus menangani pencarian berita.
     */
    public function index(Request $request)
    {
        $query = Berita::query();

        // Pencarian berita
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%')
                    ->orWhere('ringkasan', 'like', '%' . $search . '%');
            });
        }

        // Urutkan berdasarkan tanggal terbaru
        $beritas = $query
            ->latest('tanggal')
            ->get();

        return view('admin.berita.index', compact('beritas'));
    }


    /**
     * Menyimpan berita baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:100',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',

            // Maksimal upload 10 MB
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
        ];


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folder = public_path('uploads/berita');

            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }

            $gambar = $request->file('gambar');

            /*
            |--------------------------------------------------------------------------
            | PROSES GAMBAR MENJADI 1080 x 1080
            |--------------------------------------------------------------------------
            */

            $namaGambar = $this->prosesGambarBerita(
                $gambar,
                $folder
            );

            $data['gambar'] = $namaGambar;
        }


        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }


    /**
     * Menampilkan form edit berita
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('admin.berita.edit', compact('berita'));
    }


    /**
     * Mengupdate berita
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori' => 'required|string|max:100',
            'ringkasan' => 'nullable|string',
            'isi' => 'required|string',

            // Maksimal upload 10 MB
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
        ]);

        $data = [
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'tanggal' => $request->tanggal,
            'kategori' => $request->kategori,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
        ];


        /*
        |--------------------------------------------------------------------------
        | JIKA UPLOAD GAMBAR BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            /*
            |--------------------------------------------------------------------------
            | HAPUS GAMBAR LAMA
            |--------------------------------------------------------------------------
            */

            if (
                $berita->gambar &&
                file_exists(
                    public_path(
                        'uploads/berita/' . $berita->gambar
                    )
                )
            ) {
                unlink(
                    public_path(
                        'uploads/berita/' . $berita->gambar
                    )
                );
            }


            /*
            |--------------------------------------------------------------------------
            | PASTIKAN FOLDER TERSEDIA
            |--------------------------------------------------------------------------
            */

            $folder = public_path('uploads/berita');

            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }


            /*
            |--------------------------------------------------------------------------
            | PROSES GAMBAR MENJADI 1080 x 1080
            |--------------------------------------------------------------------------
            */

            $gambar = $request->file('gambar');

            $namaGambar = $this->prosesGambarBerita(
                $gambar,
                $folder
            );

            $data['gambar'] = $namaGambar;
        }


        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }


    /**
     * Menghapus berita
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if (
            $berita->gambar &&
            file_exists(
                public_path(
                    'uploads/berita/' . $berita->gambar
                )
            )
        ) {
            unlink(
                public_path(
                    'uploads/berita/' . $berita->gambar
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA BERITA
        |--------------------------------------------------------------------------
        */

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }


    /**
     * ============================================================
     * PROSES GAMBAR BERITA
     * ============================================================
     *
     * Semua gambar akan dibuat menjadi:
     *
     * 1080 x 1080 px
     *
     * TANPA CROP.
     *
     * Jika gambar landscape:
     * - gambar tetap utuh
     * - ruang kosong berada di atas dan bawah
     *
     * Jika gambar portrait:
     * - gambar tetap utuh
     * - ruang kosong berada di kiri dan kanan
     *
     * Jika gambar sudah persegi:
     * - langsung memenuhi 1080 x 1080
     */
    private function prosesGambarBerita($gambar, $folder)
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL INFORMASI GAMBAR
        |--------------------------------------------------------------------------
        */

        $pathAsli = $gambar->getRealPath();

        $info = getimagesize($pathAsli);

        if (!$info) {
            throw new \Exception(
                'File gambar tidak dapat diproses.'
            );
        }

        $lebarAsli = $info[0];
        $tinggiAsli = $info[1];
        $tipeGambar = $info[2];


        /*
        |--------------------------------------------------------------------------
        | BUAT IMAGE RESOURCE DARI FILE ASLI
        |--------------------------------------------------------------------------
        */

        switch ($tipeGambar) {

            case IMAGETYPE_JPEG:

                $gambarAsli = imagecreatefromjpeg(
                    $pathAsli
                );

                break;


            case IMAGETYPE_PNG:

                $gambarAsli = imagecreatefrompng(
                    $pathAsli
                );

                break;


            case IMAGETYPE_WEBP:

                $gambarAsli = imagecreatefromwebp(
                    $pathAsli
                );

                break;


            case IMAGETYPE_GIF:

                $gambarAsli = imagecreatefromgif(
                    $pathAsli
                );

                break;


            default:

                throw new \Exception(
                    'Format gambar tidak didukung.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | UKURAN CANVAS HASIL
        |--------------------------------------------------------------------------
        */

        $ukuranCanvas = 1080;


        /*
        |--------------------------------------------------------------------------
        | BUAT CANVAS 1080 x 1080
        |--------------------------------------------------------------------------
        */

        $canvas = imagecreatetruecolor(
            $ukuranCanvas,
            $ukuranCanvas
        );


        /*
        |--------------------------------------------------------------------------
        | BACKGROUND PUTIH
        |--------------------------------------------------------------------------
        */

        $putih = imagecolorallocate(
            $canvas,
            255,
            255,
            255
        );

        imagefill(
            $canvas,
            0,
            0,
            $putih
        );


        /*
        |--------------------------------------------------------------------------
        | HITUNG SKALA
        |--------------------------------------------------------------------------
        |
        | Kita menggunakan min() agar gambar SELALU masuk
        | ke dalam canvas 1080 x 1080.
        |
        | Tidak ada crop.
        |
        */

        $skala = min(
            $ukuranCanvas / $lebarAsli,
            $ukuranCanvas / $tinggiAsli
        );


        /*
        |--------------------------------------------------------------------------
        | HITUNG UKURAN BARU
        |--------------------------------------------------------------------------
        */

        $lebarBaru = (int) round(
            $lebarAsli * $skala
        );

        $tinggiBaru = (int) round(
            $tinggiAsli * $skala
        );


        /*
        |--------------------------------------------------------------------------
        | POSISI TENGAH
        |--------------------------------------------------------------------------
        */

        $posisiX = (int) round(
            ($ukuranCanvas - $lebarBaru) / 2
        );

        $posisiY = (int) round(
            ($ukuranCanvas - $tinggiBaru) / 2
        );


        /*
        |--------------------------------------------------------------------------
        | PINDAHKAN / RESIZE GAMBAR
        |--------------------------------------------------------------------------
        */

        imagecopyresampled(
            $canvas,
            $gambarAsli,

            $posisiX,
            $posisiY,

            0,
            0,

            $lebarBaru,
            $tinggiBaru,

            $lebarAsli,
            $tinggiAsli
        );


        /*
        |--------------------------------------------------------------------------
        | NAMA FILE BARU
        |--------------------------------------------------------------------------
        |
        | Semua hasil akhir disimpan sebagai JPG.
        |
        */

        $namaGambar =
            time() .
            '_' .
            uniqid() .
            '.jpg';


        $pathHasil = $folder .
            DIRECTORY_SEPARATOR .
            $namaGambar;


        /*
        |--------------------------------------------------------------------------
        | SIMPAN JPG QUALITY 92
        |--------------------------------------------------------------------------
        */

        imagejpeg(
            $canvas,
            $pathHasil,
            92
        );


        /*
        |--------------------------------------------------------------------------
        | HAPUS RESOURCE DARI MEMORY
        |--------------------------------------------------------------------------
        */

        imagedestroy($gambarAsli);

        imagedestroy($canvas);


        /*
        |--------------------------------------------------------------------------
        | RETURN NAMA FILE
        |--------------------------------------------------------------------------
        */

        return $namaGambar;
    }
}