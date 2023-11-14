<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'user_id',
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


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function provincies(): HasMany
    {
        return $this->hasMany(Province::class);
    }

    public function destinations(): HasMany
    {
        return $this->hasMany(Destination::class);
    }
}
