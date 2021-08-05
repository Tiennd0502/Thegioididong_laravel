<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Slider;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $guarded = [];

    public function sliders(){
        return $this->hasMany(Slider::class);
    }
}
