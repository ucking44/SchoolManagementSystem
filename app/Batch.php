<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';

    protected $primaryKey = 'id';

    protected $fillable = [
        'batch',
        'status',
    ];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }
}

