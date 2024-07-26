<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CircuitStatus extends Model
{
    use HasFactory;

    protected $table = 'circuit_statuses';

    protected $fillable = ['status_name'];
}
