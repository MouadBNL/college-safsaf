<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'subjects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'label',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subjectLessons()
    {
        return $this->hasMany(Lesson::class, 'subject_id', 'id');
    }

    public function subjectsLevels()
    {
        return $this->belongsToMany(Level::class);
    }

    public function levels()
    {
        return $this->belongsToMany(Level::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
