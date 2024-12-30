<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
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

    public function hargaPangans()
    {
        return $this->hasMany(HargaPangan::class);
    }

    public function jenisPangans()
    {
        return $this->hasMany(JenisPangan::class);
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }

    public function galeri()
    {
        return $this->hasMany(Gallery::class);
    }

    // Relasi dengan model Aktivitas
    public function aktivitas()
    {
        return $this->hasMany(Activity::class);
    }

    public function pengumuman()
    {
        return $this->hasMany(Announcements::class);
    }

    public function informasipublik()
    {
        return $this->hasMany(InformasiPublik::class);
    }

    public function pasar()
    {
        return $this->hasMany(Pasar::class);
    }

    public function arsip()
    {
        return $this->hasMany(Archive::class);
    }

}
