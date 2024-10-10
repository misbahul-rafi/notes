@php
    $dummy = [
    "error"=> [],
    "results"=> [
        [
            "closed"=> "Sudah dilakukan blocking IP Source untuk Sophos IPS pada firewall Sophos BGR, JTN dan PTM dengan detail IP 139.59.37.187",
            "content"=> "Detection : Telkomsat- Sophos IPS\nSource IP : 139.59.37.187\nSource Abuse % : 100\nSource ISP : DigitalOcean LLC\nSource Location => India\nSource Network : other\nDestination IP : 10.80.253.47\nDestination Network : Bogor\nDestination Port : 80 (100.0%)\nLog Subtype : Drop\nURL Category: scan\nsignature msg : SCAN Zgrab Scanning Attempt Detected\nFirewall rule name: LibreNMS\nEvent Count: 2\nLog Source : Telkomsat.SophosFW\nWaktu Kejyadian : 04 Oct 2024 22:17:07\n",
            "title"=> "Sophos IPS 139.59.37.187"
            ],
        [
            "closed"=> "Sudah dilakukan blocking IP Source untuk Web App Attack pada firewall Check Point dengan detail IP 116.55.72.22 188.166.224.80",
            "content"=> "Detection : Telkomsat - Web App Attack Vv\nSource IP : 116.55.72.22\nSource Abuse % : 100\nSource ISP : ChinaNet Yunnan Province Network\nSource Location : China\nSource Network : other\nDestination IP : 10.80.253.102\nDestination Network : Bogor\nCP Action: Alert_Deny\nCP Severity : High\nDestination Hostname : www.telkomsat.co.id\nURL : 45.126.155.10:443\nURL Path: /cgi-bin/../../../.././../.././.-/./bin/sh\nUser Agent : Custom-AsyncHttpClient\nhttp method : post\nThreat Level : Severe\nSignature subclass : Command Injection\nowasp top10 : A03:2021-Injection\nEvent Count: 2\nLog Source : Telkomsat.Fortiweb\nWaktu Kejadian : 04 Oct 2024 04:24:11\n\nDetection : Telkomsat - Web App Attack\nSource IP : 188.166.224.80\nSource Abuse % : 22\nSource ISP : DigitalOcean LLC\nSource Location : Singapore\nSource Network : other\nDestination IP : 10.80.253.102\nDestination Network : Bogor\nCP Action: Alert_Deny, notice\nCP Severity : High\nDestination Hostname : www.telkomsat.co.id\nURL : www.telkomsat.co.id\nURL Path : /.quarantine/ALFA_DATA/alfacgiapi/404.php?bx=0e2 15962017,\n/.quarantine/ALFA_DATA/alfacgiapt/bash.alfa, /.quarantine/ALFA_DATA/alfacgiapi/index.php?\nbx=0e215962017\nUser Agent : Mozilla/5.0 (Linux: Android 11; Redmi Note 9 Pro Build/RKQ1.200826.002: wv)\nAppleWebkKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/90.0.4430.210 Mobile Safan/537.36,\nMozlila/5.0 (Linux: Android 7.0; SM-G892A Bulid/NRD90M; wv) AppleWebKit/537.36 (KHTML like\nGecko) Version/4.0 Chrome/60.0.3112.107 Moblie Safar/537.36\nhttp method : get. post\nThreat Level : Substantial\nSignature subclass : Signatures for Common Web Applications\nowasp top10: A06:2021-Vulnerable and Outdated Components\nEvent Count : 2115\nLog Source : Telkomsat.Fortiweb\nWaktu Kejyadian : 04 Oct 2024 04:47:33\n",
            "title"=> "Web App Attack 116.55.72.22 188.166.224.80"
            ]
    ]
    ]
@endphp

@extends('layouts.main')
@section('content')
<h2 class="text-3xl font-bold text-center mb-5 text-navbar">Convert Image to Text</h2>
<div class="flex flex-col md:flex-row gap-3 justify-around">
    <form action="{{ route('convert.image') }}" method="POST" enctype="multipart/form-data"
        onsubmit="return submitted()" class="flex md:flex-col gap-3 ">
        @csrf
        <span class="flex-initial w-56 md:w-32">
            <label for="image"
                class="flex items-center justify-center cursor-pointer bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300">
                <i class="fas fa-upload text-2xl"></i>
            </label>
            <input type="file" name="images[]" multiple id="image" class="hidden">
            @if ($errors->any())
                <div class="text-red-700 ml-2 text-xs">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </span>
        <span class="flex-initial w-56 md:w-32">
            <button type="submit" id="btn-convert"
                class="flex items-center justify-center w-full bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300">
                <i class="fas fa-sync-alt text-2xl"></i>
            </button>
        </span>
        <span class="flex-initial w-56 md:w-32">
            <span
                class="flex items-center justify-center w-full bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300"
                id="btn-sophos">
                <p class="font-bold">Sophos</p>
            </span>

            <div id="sophos-options" class="hidden absolute z-10 bg-white border rounded-lg shadow-lg mt-2 w-56">
                <a href="https://10.201.201.2/"
                    class="block p-2 bg-gray-200 text-black rounded-t-lg hover:bg-gray-300 cursor-pointer" target="_blank">BGR</a>
                <a href="https://10.84.254.245/"
                    class="block p-2 bg-gray-200 text-black rounded-t-lg hover:bg-gray-300 cursor-pointer" target="_blank">JTN</a>
                <a href='https://10.80.253.243:4444/'
                    class="block p-2 bg-gray-200 text-black rounded-t-lg hover:bg-gray-300 cursor-pointer" target="_blank">PTM</a>
            </div>
        </span>
        <span class="flex-initial w-56 md:w-32">
            <a href="https://10.80.253.157/"
                class="flex items-center justify-center w-full bg-button text-white py-2 rounded-md hover:bg-buttonHover focus:outline-none focus:ring-4 focus:ring-indigo-300 font-bold">Sangfor
            </a>
        </span>
    </form>
    <section class="flex flex-col border rounded-lg p-2 md:flex-row bg-black gap-3">
        @component('components.extracted-card', ['data' => $dummy])

        @endcomponent
        @if (session('response'))
                @php
                    $response = session('response');
                @endphp
                @if (isset($response['error']) && !empty($response['error']))
                    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6 border border-red-400">
                        <p>Error: {{ implode(', ', $response['error']) }}</p>
                    </div>
                @endif
                @if (isset($response['results']) && !empty($response['results']))
                    @component('components.extracted-card', ['data' => $response])
                    @endcomponent
                @else
                    <p class="text-gray-600 mt-4">Tidak ada hasil ditemukan.</p>
                @endif
        @endif

    </section>
</div>
<script>
    const button = document.getElementById('btn-convert');
    const buttonSophos = document.getElementById('btn-sophos');
    const sophosOptions = document.getElementById('sophos-options');
    button.addEventListener('click', () => {
        document.querySelector('#btn-convert p').style.display = 'none';
        document.querySelector('#btn-convert span').style.display = 'block';
    })
    buttonSophos.addEventListener('click', (e) => {
        e.stopPropagation();
        if (sophosOptions.classList.contains('hidden')) {
            sophosOptions.classList.remove('hidden');
        } else {
            sophosOptions.classList.add('hidden');
        }
    });
    document.addEventListener('click', () => {
        sophosOptions.classList.add('hidden');
    });
    sophosOptions.addEventListener('click', (e) => {
        e.stopPropagation();
    });
</script>
@endsection
