<?php

namespace App\Models;

use App\Enums\PublishStatusEnum;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'user_id',
        'country_id',
        'province_id',
        'title',
        'description',
        'image',
        'status',
        'slug',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
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

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function getIsYesAttribute(): bool
    {
        return (int) $this->status === PublishStatusEnum::STATUS['Yes'];
    }

    public function getIsNoAttribute(): bool
    {
        return (int) $this->status === PublishStatusEnum::STATUS['No'];
    }
}