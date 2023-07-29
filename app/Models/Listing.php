<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['contributors'] ?? false) {
            $query->where('contributors', 'like', '%' . request('contributors') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('contributors', 'like', '%' . request('search') . '%');
        }
        
    }

    // Relationship To User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship With workspace
    public function listings() {
        return $this->hasMany(Listing::class, 'workspace_id');
    }
}