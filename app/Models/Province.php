<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'country_id',
        'name',
        'description',
        'image',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return \is_numeric($value)
            ? $this->where('id', $value)->firstOrFail() : $this->where('slug', $value)->firstOrFail();
    }


    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function destinations(): HasMany
    {
        return $this->hasMany(Destination::class);
    }
}
