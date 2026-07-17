<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'kode_user',
        'name',
        'email',
        'role',
        'no_hp',
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected static function booted(): void
    {
        static::creating(function ($akun) {




            // Prefix jabatan
            $prefix = match ($akun->role) {
                'admin' => 'ADM',
                'staff' => 'STF',
                default => 'USR',
            };

            // Inisial nama (maksimal 3 huruf)
            $inisial = collect(explode(' ', trim($akun->name)))
                ->map(fn($kata) => strtoupper(substr($kata, 0, 1)))
                ->take(3)
                ->implode('');

            // Tanggal + Jam
            $tanggalJam = now()->format('dmHis');

            // Kode akun
            $akun->kode_user = $prefix . $inisial . $tanggalJam;
        });
    }
}
