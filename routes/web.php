<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route basic
Route::get('about',function() {
    return 'ini adalah halaman about';
});

Route::get('profile', function() {
    return view('profile');
});


//route parameter
Route::get('produk/{namaproduk}', function($a){
    return 'saya memebeli <b>' . $a.'</b>';
});

Route::get('beli/{barang}/{jumlah}', function($a,$b){
    return view('beli',compact ('a','b'));
});

Route::get('kategori/{namakategori?}',function($nama = null) {
    if ($nama) {
    return 'anda memilih kategori: ' . $nama;
}else {
return 'anda belum memilih kategori!';
}
});

Route::get('promo/{barang}/{kode?}', function($barang = null,$kode = null){
    if ($barang && $kode) {
        $pesan = "menampilkan promo $barang dengan kode promo $kode";
    }elseif ($barang) {
        $pesan = "menampilkan promo untuk $barang";
    }else {
     $pesan = "menampilkan semua produk barang";
    }
    return view('promo',['pesan' => $pesan]);
});