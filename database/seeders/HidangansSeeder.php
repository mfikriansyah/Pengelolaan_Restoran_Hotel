<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class HidangansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_hidangan' => 'Nasi Rames Ayam',
                'harga_hidangan' => '25000',
                'stok_hidangan' => '50',
                'jenis_hidangan' => 'Makanan Berat',
                'deskripsi_hidangan' => 'Nasi Rames Ayam Khas Tanah Minang. Lauk Tersedia Ayam (Goreng, Bakar, Balado).',
                'gambar_hidangan' => 'Nasi_Rames.jpg'
            ],
            [
                'nama_hidangan' => 'Es Jeruk',
                'harga_hidangan' => '8000',
                'stok_hidangan' => '50',
                'jenis_hidangan' => 'Minuman Dingin',
                'deskripsi_hidangan' => 'Es Jeruk Dingin Menyegarkan',
                'gambar_hidangan' => 'Es_Jeruk.jpg'
            ],
            [
                'nama_hidangan' => 'Kopi Capucino Panas',
                'harga_hidangan' => '12000',
                'stok_hidangan' => '50',
                'jenis_hidangan' => 'Minuman Panas',
                'deskripsi_hidangan' => 'Kopi Capucino Latte Art Bisa Request',
                'gambar_hidangan' => 'Kopi_Capucino.jpg'
            ],
            [
                'nama_hidangan' => 'Martabak Mini',
                'harga_hidangan' => '5000',
                'stok_hidangan' => '50',
                'jenis_hidangan' => 'Makanan Ringan',
                'deskripsi_hidangan' => 'Martabak Mini Rp.5000 per satu buah. Toping Tersedia Coklat, Strawberry, Nanas, Kacang, dan Keju',
                'gambar_hidangan' => 'Martabak_MIni.webp'
            ],
            [
                'nama_hidangan' => 'Es Krim Kombo',
                'harga_hidangan' => '25000',
                'stok_hidangan' => '50',
                'jenis_hidangan' => 'Makanan Penutup',
                'deskripsi_hidangan' => 'Es Krim Dengan Toping Buah Ceri, Kacang Almond, dan Coklat Serut. Tersedia dalam Rasa Strawberry, Vanilla, dan Coklat',
                'gambar_hidangan' => 'Es_Krim_3_Rasa.png'
            ],
            [
                'nama_hidangan' => 'Nasi Ayam Geprek',
                'harga_hidangan' => '25000',
                'stok_hidangan' => '50',
                'jenis_hidangan' => 'Makanan Berat',
                'deskripsi_hidangan' => 'Nasi Ayam Geprek. Tingkat Kepedasan Level 1 - 10',
                'gambar_hidangan' => 'Ayam_Geprek.png'
            ],
            [
                'nama_hidangan' => 'Sayap Ayam Panggang Isi 10',
                'harga_hidangan' => '25000',
                'stok_hidangan' => '50',
                'jenis_hidangan' => 'Makanan Ringan',
                'deskripsi_hidangan' => 'Sayap Ayam Panggang',
                'gambar_hidangan' => 'Nasi_Rames.jpg'
            ],
            [
                'nama_hidangan' => 'Es Pisang Ijo',
                'harga_hidangan' => '15000',
                'stok_hidangan' => '50',
                'jenis_hidangan' => 'Makanan Penutup',
                'deskripsi_hidangan' => 'Es Pisang Ijo',
                'gambar_hidangan' => 'Es_Pisang_Ijo.jpg'
            ],
        ];
        DB::table('hidangans')->insert($data);
    }
}
