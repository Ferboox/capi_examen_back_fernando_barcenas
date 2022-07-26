<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;


class User_Domicilio extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user_domicilio';

    protected $fillable = ['user_id','domicilio','numero_exterior','colonia', 'cp', 'ciudad'];

    public $timestamps = false;
}
