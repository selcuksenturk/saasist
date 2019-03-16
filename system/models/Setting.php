<?php
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'sys_appconfig';
    public $timestamps = false;
}