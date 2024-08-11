<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultant;

class Patient extends Model
{
    use HasFactory;

    public function consultant()
      {
        return $this->belongsTo(Consultant::class);
      }
}
