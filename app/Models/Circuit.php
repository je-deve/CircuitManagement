<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Circuit extends Model
{
    use HasFactory;

    protected $fillable = [
        'circuit_number',
        'speed',
        'service_provider_id',
        'circuit_type_id',
        'entity_type_id',
        'entity_name_id',
        'circuit_status_id',
    ];

    // Define relationships
    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id');
    }

    public function circuitType()
    {
        return $this->belongsTo(CircuitType::class, 'circuit_type_id');
    }

    public function entityType()
    {
        return $this->belongsTo(EntityType::class, 'entity_type_id');
    }

    public function entityName()
    {
        return $this->belongsTo(EntityName::class, 'entity_name_id');
    }

    public function circuitStatus()
    {
        return $this->belongsTo(CircuitStatus::class, 'circuit_status_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

}
