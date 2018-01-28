# LARAVEL SAMARINDA

[![Total Downloads](https://poser.pugx.org/novay/laravel-samarinda/d/total.svg)](https://packagist.org/packages/novay/laravel-samarinda)
[![Build Status](https://secure.travis-ci.org/novay/laravel-samarinda.png?branch=master)](http://travis-ci.org/novay/laravel-samarinda)
[![Latest Stable Version](https://poser.pugx.org/novay/laravel-samarinda/v/stable.svg)](https://packagist.org/packages/novay/laravel-samarinda)
[![License](https://poser.pugx.org/novay/samarinda/license.svg)](https://raw.githubusercontent.com/novay/laravel-auth/LICENSE)

Package Laravel yang berisi data Kecamatan dan Kelurahan di Kota Samarinda.  

## Instalasi

### Install dan Daftarkan Package
`composer require novay/laravel-samarinda`

Tambahkan Service Provider dan Facade pada `config.app`

```
'providers' => [

    Novay\Samarinda\SamarindaServiceProvider::class

]
```

```
'aliases' => [

    'Samarinda' => Novay\Samarinda\Facade::class

]
```

### Publish Migration (Hanya Untuk Laravel 5.2)
Jika Anda menggunakan Laravel versi 5.3, abaikan langkah di bawah ini.
```
php artisan vendor:publish --provider="Novay\Samarinda\SamarindaServiceProvider"
```

### Jalankan Migration
```
php artisan migrate
```

### Jalankan Seeder Untuk Mengisi Data Daerah
```
php artisan novay:samarinda:seed
```

## Penggunaan

`Samarinda::allKecamatan()`  
`Samarinda::paginateKecamatan($numRows = 15)`  
`Samarinda::allKelurahan()`  
`Samarinda::paginateKelurahan($numRows = 15)`  

---

`Samarinda::findKecamatan($kecamatanId, $with = null)`  
`array $with`: `kelurahan`

`Samarinda::findKelurahan($kelurahanId, $with = null)`  
`array $with`: `kelurahan`

#### Examples

```php
Samarinda::findKecamatan(11, ['kelurahan']);

/*
Will return
Kecamatan Object {
    'id' => 11,
    'nama' => 'SAMBUTAN',
    'kelurahan' => Kelurahan Collections {
        Kelurahan Object,
        Kelurahan Object,
        Kelurahan Object,
        ...
    }
}
*/
```

---

`Samarinda::search('sambutan')->all()`  
`Samarinda::search('sambutan')->allKecamatan()`  
`Samarinda::search('sambutan')->paginateKecamatan()`  
`Samarinda::search('sambutan')->allKelurahan()`  
`Samarinda::search('sambutan')->paginateKelurahan()`  

---