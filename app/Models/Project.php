<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'client_id',
        'directeur_id',
        'group_conception_id',
        'group_des_id',
        'group_dev_id',
        'group_test_id',
        'date_debut',
        'date_fin',
        'statut',
        'statut_payement',
        
    ];

    

}