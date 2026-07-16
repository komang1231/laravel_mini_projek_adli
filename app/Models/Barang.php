<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Barang
 *
 * @property $id
 * @property $kode_barang
 * @property $nama_barang
 * @property $deskripsi
 * @property $harga
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Barang extends Model
{
    use SoftDeletes;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barangs';
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'kategori_id',
    ];


    protected static function booted(): void
    {
        static::creating(function ($barang) {


            // Inisial nama (maksimal 3 huruf)
            $inisial = collect(explode(' ', trim($barang->nama_barang)))
                ->map(fn($kata) => strtoupper(substr($kata, 0, 1)))
                ->take(3)
                ->implode('');

            // Inisial nama kategori (maksimal 1 huruf)
            // $inisialKategori = substr(trim($barang->nama_kategori), 0, 1);

            // Tanggal + Jam
            $tanggalJam = now()->format('dmHis');

            // Kode akun
            $barang->kode_barang = $inisial
                // . $inisialKategori 
                . $tanggalJam;
        });
    }
}
