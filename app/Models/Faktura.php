<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faktura extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'datum',
        'ukupno',
        'kolicina',
        'cena',
        'kupac_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'datum' => 'date',
            'kupac_id' => 'integer',
        ];
    }

    public function kupac(): BelongsTo
    {
        return $this->belongsTo(Kupac::class);
    }

    public function izracunajUkupno()
    {
        return $this->kolicina * $this->cena;
    }


}
