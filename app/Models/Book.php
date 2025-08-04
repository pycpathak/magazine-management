<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
       use HasFactory;

    protected $fillable = [
        'book_name',
        'book_edition',
        'price',
        'publication_frequency',
        'notes',
    ];

    public static function frequencies(): array
    {
        return [
            'Monthly'    => 'Monthly',
            'Quarterly'  => 'Quarterly',
            'Bi-Annual'  => 'Bi-Annual',
            'Annual'     => 'Annual',
        ];
    }
}
