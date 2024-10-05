<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormatterController extends Controller
{
    public function index()
    {
        return view('formatter.index');
    }

    public function format(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'format' => 'required|string|in:webattack,sophosips,sangforips',
        ]);
        $text = $request->input('text');
        $format = $request->input('format');

        switch ($format) {
            case 'webattack':
                $formattedText = $this->webAttack($text);
                break;
            case 'sophosips':
                $formattedText = $this->sophosips($text);
                break;
            case 'sangforips':
                $formattedText = $this->sangforips($text);
                break;
            default:
                $formattedText = $text;
                break;
        }
        return view('formatter.index', ['formattedText' => $formattedText]);
    }
    private function webAttack($text)
    {
        preg_match_all('/Source IP : (\d+\.\d+\.\d+\.\d+)/', $text, $matches);
        ;
        $sourceIPs = isset($matches[1]) ? $matches[1] : [];

        if (empty($sourceIPs)) {
            return "Tidak ada Source IP yang ditemukan.";
        }

        return "Sudah dilakukan blocking IP Source pada Firewall Check Point dengan Address berikut:\n" . implode("\n", $sourceIPs);
    }
    private function sophosips($text)
    {
        preg_match_all('/Source IP : (\d+\.\d+\.\d+\.\d+)/', $text, $matches);
        $sourceIPs = isset($matches[1]) ? $matches[1] : [];
        if (empty($sourceIPs)) {
            return "Tidak ada Source IP yang ditemukan.";
        }
        return "Sudah dilakukan blocking IP Source pada firewall Sophos BGR, JTN dan PTM pada IP Source\n" . implode("\n", $sourceIPs);
    }
    private function sangforips($text)
    {
        preg_match_all('/Source IP : (\d+\.\d+\.\d+\.\d+)/', $text, $matches);
        $sourceIPs = isset($matches[1]) ? $matches[1] : [];
        if (empty($sourceIPs)) {
            return "Tidak ada Source IP yang ditemukan.";
        }
        return "Sudah dilakukan blocking IP Source pada Firewall NGAF-01 dengan detail Address berikut:\n" . implode("\n", $sourceIPs);
    }
}
