<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'levels';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'label',
        'code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function levelLessons()
    {
        return $this->hasMany(Lesson::class, 'level_id', 'id');
    }

    public function levelsSubjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
