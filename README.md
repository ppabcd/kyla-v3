# Kyla-AI V.3
Kyla AI Merupakan sebuah project yang sedang dikembangkan saat ini. Untuk saat ini project ini baru kerangkanya saja.
# Installasi
Untuk installasi silahkan gunakan command
```bash
    composer install
```
Lalu ubah settingan di setiap folder config sesuai dengan instruksi yang diberikan.
Lalu jalankan index.php di dalam webserver.
# Cara Kerja
## Routing
Project ini menggunakan sistem routing dengan menggunakan segment. Pada segment pertama adalah sebuah nama controller dan selanjutnya adalah nama dari sebuah method.
## Model
Dalam pembuatan model harus memanggil Core dari model yang berada di folder System\\Core\\Model serta mengextends Model dari core yang sudah dibuat. Untuk contoh silahkan lihat di App\\Models\\User.php
## Controller
Hampir sama dengan model harus mengextends Core Controller. Untuk membatasi tipe request dari user, kalian bisa menggunakan function method seperti berikut. Defaultnya semua method type dapat mengakses method yang ada di suatu class.
```php
public function index(){
    method('get'); // Hanya menerima Request Method Get
}

```
Untuk contoh lebih lanjut berada di file App\\Controllers\\Gui.php
## View
Dalam memanggil view yang ada di controller, kalian hanya membutuhkan syntax seperti berikut pada controller.
```php
public function index(){
    self::view('path.index',[
        'Messages'=>'Hello'
    ]);
}
```
Pada argument pertama adalah lokasi file view dimana view berada pada folder App\\Views. Penggunaan tanda . seperti code diatas akan diubah menjadi App\\Views\\path\\index.php.

Pada argument kedua adalah array yang nantinya akan diubah menjadi sebuah variabel pada file view.

# Messenger
Di dalam Kyla AI ini terdapat fitur mengirimkan pesan ke messenger. Fitur ini merupakan library dari <a href="https://github.com/ammarfaizi2">Ammar Faizi</a>. Untuk menggunakannya kamu harus mengisi config facebook sesuai dengan akun yang akan mengirimkan pesan. Dalam mengirim pesan gunakan controller Messenger. Untuk contoh pengiriman pesan terdapat pada file cron.php

# Fitur Lain
Hingga saat ini saya sedang mengembangkan fitur-fitur lainnya untuk project ini. Terima kasih.

## License

Released under MIT License - see the [License File](LICENSE) for details.
