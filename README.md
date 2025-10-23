## 📘 README.md (versi profesional dan lengkap)

````markdown
# 🧾 TodoList REST API (Laravel + Sanctum)

Proyek ini adalah RESTful API untuk aplikasi **TodoList** yang dibangun menggunakan **Laravel 11** dan **Laravel Sanctum** untuk autentikasi token berbasis Bearer Token.  
API ini menyediakan fitur CRUD untuk mengelola tugas (tasks) per pengguna yang sudah terautentikasi.

---

## 🚀 Features
- 🔐 Register, Login, dan Logout menggunakan Laravel Sanctum
- ✅ CRUD (Create, Read, Update, Delete) Task
- 👤 Setiap user hanya bisa mengakses task miliknya sendiri
- 📄 Validasi request dengan FormRequest
- 🧱 Struktur kode rapi dan mengikuti standar REST API

---

## 🧭 Tech Stack
- **Framework:** Laravel 11
- **Authentication:** Laravel Sanctum
- **Database:** MySQL
- **Documentation:** Postman Public Documentation
- **Version Control:** Git + GitHub

---

## 🗂️ API Documentation
Dokumentasi API ini dibuat dan dipublikasikan menggunakan **Postman**.  
Kamu bisa mengaksesnya secara publik di tautan berikut:

🔗 **Public API Documentation:** [Klik di sini](https://documenter.getpostman.com/view/48833633/2sB3WjxNib)  
*(ganti `YOUR_PUBLIC_LINK` dengan link public Postman Collection kamu)*

---

## 🧱 Entity Relationship Diagram (ERD)
Berikut adalah struktur database yang digunakan dalam proyek ini.

📊 **File ERD:** [`app/ERD/ER-DIAGRAM_TODOS.drawio`](./app/ERD/ER-DIAGRAM_TODOS.drawio)

![ER Diagram](https://raw.githubusercontent.com/YOUR_USERNAME/YOUR_REPO_NAME/main/app/ERD/ER-DIAGRAM_TODOS.png)
> *(opsional: kamu bisa export .drawio menjadi .png dan push ke repo biar bisa tampil seperti ini)*

---

## 🔧 Installation Guide
1. Clone repository ini:
   ```bash
   git clone https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git
````

2. Masuk ke folder project:

   ```bash
   cd YOUR_REPO_NAME
   ```
3. Install dependencies:

   ```bash
   composer install
   ```
4. Buat file `.env` dan konfigurasi database:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Jalankan migrasi database:

   ```bash
   php artisan migrate
   ```
6. Jalankan server:

   ```bash
   php artisan serve
   ```

---

## 🧪 Example Endpoints

| Method | Endpoint          | Description                       |
| ------ | ----------------- | --------------------------------- |
| POST   | `/api/register`   | Register user baru                |
| POST   | `/api/login`      | Login dan mendapatkan token       |
| POST   | `/api/logout`     | Logout dan hapus token aktif      |
| GET    | `/api/tasks`      | Menampilkan semua task milik user |
| POST   | `/api/tasks`      | Membuat task baru                 |
| GET    | `/api/tasks/{id}` | Menampilkan detail task tertentu  |
| PUT    | `/api/tasks/{id}` | Update status task                |
| DELETE | `/api/tasks/{id}` | Hapus task                        |

---

## 🧑‍💻 Author

**Nama:** [Sheiza Fakhru Rasyid]
**GitHub:** [@yourusername](https://github.com/sheiza31)
**Email:** [youremail@example.com](mailto:seizzafr@example.com)

---

## 📜 License

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

````

---

### 🔧 Langkah-langkah selanjutnya:

1. Buka file `README.md` kamu di root project.
2. Hapus isi lama (kalau ada).
3. Paste template di atas.
4. Ganti:
   - `YOUR_PUBLIC_LINK` → link publik Postman Collection kamu.
   - `YOUR_USERNAME` dan `YOUR_REPO_NAME` → sesuai GitHub kamu.
   - `Nama Kamu` dan `Email` sesuai identitasmu.
5. Commit dan push ke GitHub:
   ```bash
   git add README.md
   git commit -m "docs: update README.md with public API docs and ERD info"
   git push origin main
````

---


