<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SeasonImage extends Model
{
    use HasFactory;

    protected $fillable = ['season', 'image_url'];

    protected $appends = ['url'];

    protected $hidden = ['image_url'];

    public function url(): Attribute
    {
        return Attribute::get(fn () => $this->image_url ? Storage::disk('public')->url($this->image_url) : null);
    }
}
