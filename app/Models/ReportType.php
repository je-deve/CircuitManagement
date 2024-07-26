<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportType extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_type'
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
