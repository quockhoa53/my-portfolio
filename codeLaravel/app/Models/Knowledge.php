<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    use HasFactory;

    protected $fillable = ['knowledge_type_id', 'title', 'content'];

    public function knowledgeType()
    {
        return $this->belongsTo(KnowledgeType::class);
    }

}
