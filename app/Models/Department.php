<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employes()
    {
        return $this->hasMany(Employe::class);
    }

    public static function getDepartments()
    {
        return self::all();
    }

}
