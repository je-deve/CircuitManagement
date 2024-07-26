<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_date',
        'completion_date',
        'report_detail',
        'circuit_id',
        'report_type_id',
        'user_id',
        'circuit_status_id',
    ];

    public function circuit()
    {
        return $this->belongsTo(Circuit::class);
    }

    public function reportType()
    {
        return $this->belongsTo(ReportType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function circuitStatus()
    {
        return $this->belongsTo(CircuitStatus::class, 'circuit_status_id');
    }
}
