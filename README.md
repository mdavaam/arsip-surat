# 📁 Aplikasi Arsip Surat

Aplikasi web untuk mengarsipkan surat-surat resmi yang dibuat oleh petugas kelurahan. Aplikasi ini memungkinkan penyimpanan, pencarian, dan pengelolaan dokumen surat dalam format **PDF**.

---

## 🎯 Tujuan

Aplikasi ini dibuat untuk memenuhi kebutuhan **Desa Karangduren, Kecamatan Pakisaji** dalam mengelola arsip surat-surat resmi.  
Setiap surat yang diterbitkan dapat dipindai (scan) dalam format PDF dan disimpan dalam sistem untuk memudahkan pencarian dan pengunduhan di kemudian hari.

---

## ✨ Fitur Utama

### 🏠 Halaman Utama

-   **Daftar Arsip Surat** – Menampilkan semua surat yang telah diarsipkan
-   **Pencarian Surat** – Mencari surat berdasarkan judul
-   **Filter & Sorting** – Mengurutkan berdasarkan waktu pengarsipan

### 📤 Pengelolaan Surat

-   **Upload Surat PDF** – Mengunggah file surat dalam format PDF
-   **Detail Surat** – Melihat informasi lengkap surat
-   **Download PDF** – Mengunduh file surat yang diarsipkan
-   **Hapus Surat** – Menghapus arsip surat dengan konfirmasi

### 📂 Manajemen Kategori

-   **CRUD Kategori** – Tambah, lihat, edit, hapus kategori surat
-   **Kategori Default**:
    -   Pengumuman
    -   Undangan
    -   Nota Dinas
    -   Pemberitahuan

### ℹ️ Halaman About

-   Informasi pembuat aplikasi
-   Detail pengembang dan tanggal pembuatan

---

## 🛠️ Teknologi

-   **Framework**: Laravel 12.x
-   **Database**: SQLite
-   **Frontend**: Bootstrap 5.3
-   **File Storage**: Laravel Storage (Public Disk)
-   **PDF Handling**: Built-in File Upload

---

## 📋 Persyaratan Sistem

-   PHP >= 8.2
-   Composer
-   Node.js & NPM (opsional untuk asset compilation)
-   Web Server (Apache/Nginx) atau PHP Built-in Server

---

## 🚀 Instalasi & Menjalankan Aplikasi

1. **Clone Repository**

    ```bash
    git clone https://github.com/mdavaam/arsip-surat.git
    cd arsip-surat
    ```

2. **Install Dependencies**

    ```bash
    composer install
    Environment Setup
    ```

3. **Environment Setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Setup**
    ```bash
    touch database/database.sqlite
    php artisan migrate:fresh --seed
    ```
5. **Jalankan Server**
    ```bash
    php artisan serve
    ```
