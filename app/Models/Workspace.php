<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory;












    // Relationship To listings
    public function user()
    {
        return $this->belongsTo(User::class, 'workspace_id');
    }
}
