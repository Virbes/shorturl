<?php

namespace App\Models;

use App\Models\User;
use App\Classes\CodeGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'user_id'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function short_url($long_url)
    {
        // Crear la URL
        $url = self::create([
            'url' => $long_url,
            'user_id' => auth()->user()->id
        ]);

        // Generación de código
        $code = (new CodeGenerator())->get_code($url->id);

        // Actualizar el código en al $url
        $url->code = $code;
        $url->save();

        return $url->code;
    }
}
