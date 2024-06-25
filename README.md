# Restful API Laravel 11

## Daftar Isi

-   [Instalasi](#instalasi)
-   [Daftar Route](#routing)
-   [Fitur](#fitur)
-   [Kontak](#kontak)

## Instalasi

Langkah-langkah untuk menginstal Restful API Laravel 11 ini:

1. Clone repositori ini.
    ```bash
    git clone git@github.com:rizkijanuarr/laravel-11-api.git
    ```
2. Masuk ke direktori proyek.
    ```bash
    cd laravel-11-api
    ```
3. Copy .env.example to .env
    ```bash
    cp .env.example .env
    ```
4. Install Composer.
    ```bash
    composer install
    ```
5. Generate App Key.
    ```bash
    php artisan key:generate
    ```
6. Konfigurasi Database on file .env
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel-11-api
    DB_USERNAME=root
    DB_PASSWORD=sesuaikan
    ```
7. Storage link.
    ```bash
    php artisan storage:link
    ```
8. Migration ke Database.
    ```bash
    php artisan migrate
    ```
9. Jalankan web server.
    ```bash
    php artisan serve
    ```

## Routing

```markdown
-   http://127.0.0.1:8000/api/v1/posts || GET ✅
-   http://127.0.0.1:8000/api/v1/posts || STORE ✅
-   http://127.0.0.1:8000/api/v1/posts/1 || SHOW ✅
-   http://127.0.0.1:8000/api/v1/posts/1 || UPDATE ✅
-   http://127.0.0.1:8000/api/v1/posts/1 || DELETE ✅
```

## Fitur

1. GET
    ```bash
    {
        "success": true,
        "message": "List Data Posts",
        "data": {
            "current_page": 1,
            "data": [],
            "first_page_url": "http://127.0.0.1:8000/api/v1/posts?page=1",
            "from": null,
            "last_page": 1,
            "last_page_url": "http://127.0.0.1:8000/api/v1/posts?page=1",
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http://127.0.0.1:8000/api/v1/posts?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "next_page_url": null,
            "path": "http://127.0.0.1:8000/api/v1/posts",
            "per_page": 5,
            "prev_page_url": null,
            "to": null,
            "total": 0
        }
    }
    ```
2. STORE

    > [!IMPORTANT]\
    > Masuk ke dalam tab (Body) dan pilih (form-data)

    | KEY     | TYPE   | VALUE                      |
    | ------- | ------ | -------------------------- |
    | image   | `file` | Pilih gambar dari komputer |
    | title   | `text` | Citra Yudisium, yay!       |
    | content | `text` | Yayy, kerennn!             |

    ```bash
    {
        "success": true,
        "message": "Data Post Berhasil Ditambahkan!",
        "data": {
            "image": "http://127.0.0.1:8000/storage/posts/b20chVL3TBGoRVDHZNXFiqlenfrPH4tosA7TkPq7.png",
            "title": "Citra Yudisium, yay!",
            "content": "Yayyy kerennn!",
            "updated_at": "2024-06-25T08:14:50.000000Z",
            "created_at": "2024-06-25T08:14:50.000000Z",
            "id": 1
        }
    }
    ```

## Kontak

Jika Anda ingin menghubungi saya, Anda dapat mengirim email ke <rzkjanuarr@gmail.com>.
