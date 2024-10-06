<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImageConverterController extends Controller
{
    public function index()
    {
        return view('image-converter.index');
    }
    public function convert(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = $request->file('images');

        try {
            $http = Http::asMultipart();
            $apiUrl = env('API_IMG2TEXT') . '/img2text';

            foreach ($images as $image) {
                if (!$image->isValid()) {
                    Log::error('File image tidak valid.', ['file' => $image->getClientOriginalName()]);
                    return redirect()->route('convert.image')->withErrors(['image' => 'File image tidak valid.']);
                }
                $http = $http->attach('images', file_get_contents($image->getRealPath()), $image->getClientOriginalName());
            }
            $response = $http->post($apiUrl);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data response dari API:', $data);
                return redirect()->route('convert.image')->with('response', $data);
            } else {
                Log::error('Gagal memproses gambar.', ['status' => $response->status(), 'body' => $response->body()]);
                return redirect()->route('convert.image')->withErrors(['error' => 'Gagal memproses gambar.']);
            }

        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'foreach() argument must be of type array|object, null given') !== false) {
                return redirect()->route('convert.image')->withErrors(['error' => 'Not File Choice.']);
            }
            Log::error('Terjadi kesalahan saat mengirim gambar ke API Flask.', ['error' => $e->getMessage()]);

            return redirect()->route('convert.image')->withErrors(['error' => 'Terjadi kesalahan saat mengirim gambar ke API.']);
        }
    }
}
