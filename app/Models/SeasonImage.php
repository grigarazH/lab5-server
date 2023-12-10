<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SeasonImage extends Model
{
    use HasFactory;

    protected $fillable = ['season', 'image'];

    protected $hidden = ['image'];

    protected $appends = ['image_data'];

    public function image_data(): Attribute
    {
        return Attribute::get(fn () => base64_encode($this->image));
    }
}
