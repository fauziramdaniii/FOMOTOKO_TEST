DOKUMENTASI ASSESTMENT TEST FOMOTOKO
LANGKAH 1
- CLONE PROJECT
- COPY FILE .ENV.EXAMPLE
- EDIT FILE COPY .ENV.EXAMPLE.COPY MENJADI .ENV
- BUKA SERVER APACHE (XAMPP) LOCALHOST/PHPMYADMIN
- BUAT DATABASE FOTOMOTO (EX: DB_FOMOTOKO)
- EDIT DB_DATABASE PADA FILE .ENV SAMAKAN DENGAN DB_DATABASE PADA PHPMYADMIN (DB_FOMOTOKO)
  
LANGKAH 2
- BUKA TERMINAL LALU, PHP ARTISAN MIGRATE SEHINGGA TABLE YANG DIBUTUHKAN AKAN MASUK DI DATABASE
- KEMUDIAN PHP ARTISAN DB:SEED --CLASS=PRODUCTSEEDER, DIGUNAKAN UNTUK INSERT DATA DUMMY PADA TABLE PRODUCT
- BERIKUT ADALAH API YANG BISA ANDA HIT DI POSTMAN BERDASARKAN SOAL NO 1
- http://localhost:8000/api/pesanan (POST, GET, UPDATE, DELETE)
  Dengan Body Json Sebagai berikut Apabila POST dan Update
  {
    "nama_pelanggan": "Fulan",
    "alamat_pengiriman": "Bandung"
  }
- http://localhost:8000/api/item-pesanan/id_pesanan_diatas (POST, GET, UPDATE, DELETE)
  Dengan Body Json Sebagai berikut Apabila POST dan Update
  {
    "nama_barang": "Mie LEgeg",
    "jumlah": 2
  }
- http://localhost:8000/api/flash-sales (GET, POST)
  Dengan Body Json Sebagai berikut Apabila POST 
  {
    "product_id": 1, // ID produk yang akan dijual, ID yang didapat dari seeeder diatas
    "harga_flash_sale": 10000, // Harga selama flash sale
    "mulai_flash_sale": "2023-10-14 10:00:00", // Waktu mulai flash sale
    "selesai_flash_sale": "2023-10-14 14:00:00" // Waktu selesai flash sale
  }
- Kemudian Dibuat Fungsi untuk mengetahui kondisi Race Contion yang ada Pada Direktori Test/Feature/FlashSaleCondition.php
- Buka Terminal lalu ketikan php artisan test untuk melihat result true or false nya, jika true Kondisi Fungsi dalam Handle Race Kondisi nya Tepat atau cuman 1 yang ke CheckOut
  
Langkah 3
Berkaitan Dengan Soal No 2
- Code Game nya ada pada Direktori App/console/command/hiddenItemGame.php
- Gunakan perintah php artisan game:hidden-item
- dan baca petunjuk game, game nya dibuat pada console atau cmd

Semoga Bermanfaat
