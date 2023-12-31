<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $attributes = array(
        'status' => 0
    );

    public function scopeFilter($query, $filter) {
        if($filter ?? false) {
            $query->where('status', 'like', '%' . Category::category[request('category')] . '%');
        }
    }
}
