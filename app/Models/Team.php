<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
   
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'directeur_id',
        'groupe_id',
        
    ];

    /**
     * Set the categories
     *
     */
     public function setCatAttribute($value)
     {
        return $this->attributes['groupe_id'] = json_encode($value);
     }
  
    // /**
    //  * Get the categories
    //  *
    //  */
    public function getCatAttribute($value)
     {
         return $this->attributes['groupe_id'] = json_decode($value);
     }

}
