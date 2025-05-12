<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeType extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    public function knowledges()
    {
        return $this->hasMany(Knowledge::class);
    }
}
