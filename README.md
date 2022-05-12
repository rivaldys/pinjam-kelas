# Pinjam Kelas Web-App

Sistem peminjaman ruang kelas berbasis web yang dapat digunakan untuk melakukan pengajuan peminjaman ruang kelas dan pengelolaan peminjaman ruang kelas itu sendiri. Dibuat sebagai alternatif dari mekanisme peminjaman ruang kelas secara manual yang umumnya menggunakan media kertas untuk melakukan pengajuan peminjaman.


## Fitur

* Mengajukan peminjaman ruang kelas
* Mengelola peminjaman yang diajukan oleh pengguna (menyetujui, menghapus, memeriksa data peminjaman, dan lain sebagainya)
* Unduh data peminjaman berdasarkan tanggal
* Dapat diintegrasikan dengan perangkat/*hardware* penguncian pintu otomatis (saat ini hanya masih menggunakan prototipe perangkat penguncian sederhana hasil perpaduan RFID dan *Solenoid Door Lock*)
* Tampilan aplikasi dibangun secara responsif (*responsive web design*) sehingga tampilan akan menyesuaikan perangkat yang digunakan, bila menggunakan perangkat komputer akan menyesuaikan tampilan komputer, sedangkan bila menggunakan ponsel akan menyesuaikan tampilan ponsel


## Informasi Pendukung

Pastikan ketika ingin menggunakan kode sumber (*source code*) ini, terlebih dahulu *import* database yang ada pada direktori ***assets*** > ***db***,
kemudian silakan pilih salah satu database yang tersedia.

Terdapat beberapa level pengguna (*user*) yang dapat mengakses aplikasi ini, yakni:
* Bagian Umum (setara Super Admin yang memiliki akses penuh)
  - *username*: umum
  - *password*: login.admin
* Kepala Bagian/Kaprodi (admin dengan akses terbatas, hanya verifikasi peminjaman)
  - *username*: kabag
  - *password*: login.admin
* Biro Pendidikan (admin dengan akses terbatas, hanya verifikasi peminjaman)
  - *username*: biropend
  - *password*: login.admin
* Pengguna Ruangan/*User* (pengguna biasa)
  - *username*: user
  - *password*: login.user


## Tampilan Aplikasi

![Halaman Login](https://user-images.githubusercontent.com/76983038/104809591-0a01fe80-5821-11eb-9234-b142322e1b07.PNG)

![Halaman Beranda](https://user-images.githubusercontent.com/76983038/104809861-ffe0ff80-5822-11eb-9f66-6fd0d4f1614d.PNG)

![Kelola Akun Pengguna](https://user-images.githubusercontent.com/76983038/104810321-500d9100-5826-11eb-8ae4-62c783f36177.PNG)

![Kelola Data Ruangan](https://user-images.githubusercontent.com/76983038/104810359-92cf6900-5826-11eb-9935-b2fb17ec7038.PNG)

![Data Peminjaman](https://user-images.githubusercontent.com/76983038/104810381-b4305500-5826-11eb-977e-ea2e0360bc36.PNG)

![Ajukan Peminjaman](https://user-images.githubusercontent.com/76983038/104810395-cb6f4280-5826-11eb-9f22-f6549d021a3a.PNG)

![Riwayat Akses Ruanagan](https://user-images.githubusercontent.com/76983038/104810407-e2159980-5826-11eb-9d2d-37a2f0010292.PNG)


## Author

Ahmad Rivaldy S - [Kunjungi Situs](https://rivaldy.net)
