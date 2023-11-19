<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Major extends Model
{
    use HasFactory;
   protected $fillable = [
        'name'
    ];
    protected $guarded;

    public function students()
    {
        return $this->hasMany(Student::class,'major_id','id');
    }
}