<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityName extends Model
{
    use HasFactory;

    protected $table = 'entity_name';

    protected $fillable = ['entity_name'];
}
