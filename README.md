# Personal Tools Application

**Personal Tools** adalah aplikasi berbasis web yang menyediakan berbagai alat personal seperti catatan, format teks, dan konversi gambar menjadi teks/log. Aplikasi ini dibangun menggunakan Laravel sebagai backend utama dan Flask untuk proses konversi gambar dengan menggunakan mesin Tesseract OCR.

## Fitur

1. **Catatan (Note-taking)**: Aplikasi ini menyediakan fitur untuk membuat, mengedit, dan mengelola catatan pribadi.
2. **Text Formatter**: Fitur ini memungkinkan pengguna untuk memformat teks sesuai kebutuhan, seperti memodifikasi gaya penulisan.
3. **Konversi Gambar ke Teks (OCR)**: Menggunakan Tesseract OCR, aplikasi ini dapat mengkonversi gambar menjadi teks atau log. Proses konversi dilakukan oleh aplikasi Flask yang berkomunikasi dengan Laravel melalui API.

## Teknologi yang Digunakan

- **Laravel**: Sebagai program utama dan pengelola fitur-fitur utama aplikasi.
- **Flask**: Digunakan untuk melakukan konversi gambar menjadi teks dengan menggunakan Tesseract OCR.
- **Tesseract OCR**: Mesin OCR untuk ekstraksi teks dari gambar.
- **Docker** (Opsional): Untuk memudahkan setup.
- **MySQL**: Sebagai database aplikasi yang akan menyimpan catatan

## Instalasi

### Prasyarat
Pastikan Anda sudah menginstal:
- Git
- Docker

### Langkah-langkah Instalasi

1. **Clone repository**:
    ```bash
    git clone https://github.com/misbahul-rafi/notes.git
    cd notes
    ```

2. **Setup environment Laravel**:
    Copy file `.env.example` ke `.env`:
    ```bash
    cp .env.prod .env
    ```
    Sesuaikan variabel environment di file `.env`
    ```bash
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```
    ****Harap dipastikan DB_HOST sama dengan nama container untuk database pada docker-compose.yml*** 

3. **Generate key aplikasi Laravel**:
    Build image untuk ocrservice dan aplikasi notes
    ```bash
    docker build -t ocrservice:latest ./docker/ocrservice/. --no-cache
    docker build -t ocrservice:latest . --no-cache
    ```


## Struktur Proyek

```bash
personal-tools/
├── app/                # Directory utama Laravel
├── flask-app/          # Directory Flask untuk konversi gambar
├── public/             # Public folder Laravel
├── resources/          # Views dan assets Laravel
├── routes/             # Routing Laravel
├── .env                # Environment file
├── composer.json       # Dependencies PHP
├── package.json        # Dependencies front-end
└── README.md           # Dokumentasi ini
