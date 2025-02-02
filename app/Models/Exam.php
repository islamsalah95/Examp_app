<?php

namespace App\Models;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'chapter_id',
        'type'
    ];

    
    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        $chapter = $this->chapter ? $this->chapter->name : null;


        // Only return specific fields for indexing
        return [
            'name' => $this->name,
            'chapter_id' => $chapter,
        ];
    }
}
