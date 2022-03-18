<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticao extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'value', 'date', 'note'];

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('description', 'like', '%' . $search . '%');
            });
        });
    }
}
