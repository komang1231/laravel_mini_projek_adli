<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

/**
 * Class Kategori
 *
 * @property $id
 * @property $kode_kategori
 * @property $nama_kategori
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Kategori extends Model
{
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['kode_kategori', 'nama_kategori'];

    protected static function booted(): void
    {
        static::creating(function ($kategori) {

            // Inisial nama (maksimal 3 huruf)
            $inisial = collect(explode(' ', trim($kategori->nama_kategori)))
                ->map(fn($kata) => strtoupper(substr($kata, 0, 1)))
                ->take(3)
                ->implode('');

            // Tanggal + Jam
            $tanggalJam = now()->format('dmHis');

            // Kode akun
            $kategori->kode_kategori = $inisial . $tanggalJam;
        });
    }
}
