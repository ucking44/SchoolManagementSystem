<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';

    protected $fillable = [
        'batch',
    ];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }
}

