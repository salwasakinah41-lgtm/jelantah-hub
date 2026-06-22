<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'masyarakat_id',
    'pengepul_id',
    'liter_estimasi',
    'tanggal_penjemputan',
    'status',
    'liter_bersih',
    'endapan',
    'harga_dibayar'
])]
class Setoran extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'tanggal_penjemputan' => 'date',
            'liter_estimasi' => 'float',
            'liter_bersih' => 'float',
            'endapan' => 'float',
            'harga_dibayar' => 'integer',
        ];
    }

    /**
     * Hubungan: Setoran ini milik siapa (Warga)
     */
    public function masyarakat(): BelongsTo
    {
        // PERBAIKAN: Menggunakan $this, bukan $table
        return $this->belongsTo(User::class, 'masyarakat_id');
    }

    /**
     * Hubungan: Setoran ini diserahkan ke siapa (Pengepul)
     */
    public function pengepul(): BelongsTo
    {
        // PERBAIKAN: Menggunakan $this, bukan $table
        return $this->belongsTo(User::class, 'pengepul_id');
    }
}