<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ImageConverterController extends Controller
{
    public function index()
    {

        return view('image-converter.index', compact('data'));
    }
    public function convert(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'images.*.required' => 'Please upload an image to be processed.',
            'images.*.image' => 'The uploaded file must be an image.',
            'images.*.mimes' => 'The image must be in jpeg, png, or jpg format.',
            'images.*.max' => 'The image size must not exceed 2MB.',
        ]);

        $images = $request->file('images');

        try {
            $http = Http::asMultipart();
            $apiUrl = env('API_IMG2TEXT') . '/img2text';

            foreach ($images as $image) {
                if (!$image->isValid()) {
                    Log::error('File image not validated', ['file' => $image->getClientOriginalName()]);
                    return redirect()->route('convert.image')->withErrors(['image' => 'File image not validated']);
                }
                $http = $http->attach('images', file_get_contents($image->getRealPath()), $image->getClientOriginalName());
            }
            $response = $http->post($apiUrl);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Success Process Image from API');
                return redirect()->route('convert.image')->with('response', $data);
            } else {
                Log::error('Failed to process file', ['status' => $response->status(), 'body' => $response->body()]);
                return redirect()->route('convert.image')->withErrors(['error' => 'Failed to process file']);
            }

        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'foreach() argument must be of type array|object, null given') !== false) {
                return redirect()->route('convert.image')->withErrors(['error' => 'No File Choice']);
            }

            if (strpos($e->getMessage(), 'cURL error 7: Failed to connect to') !== false) {
                Log::error('Connection to API failed', ['error' => $e->getMessage()]);
                return redirect()->route('convert.image')->withErrors(['error' => 'Internal Server Error']);
            }

            Log::error('Unkown', ['error' => $e->getMessage()]);
            return redirect()->route('convert.image')->withErrors(['error' => 'Unkown Error']);
        }
    }
}
