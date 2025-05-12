<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'images',
        'status',
        'url_demo',
        'priority',
        'project_type_id'
    ];

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }
}
