<?php namespace Modules\Users\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model {

    protected $table = 'app_modules';
    protected $primaryKey = 'module';
    protected $fillable = ['module','descripcion'];

}