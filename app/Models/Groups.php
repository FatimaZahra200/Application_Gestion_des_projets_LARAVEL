<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type_group',
        'chef_project_id',
        'membre_id',
    ];

    /**
     * Set the categories
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['membre_id'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['membre_id'] = json_decode($value);
    }

}


