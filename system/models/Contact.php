<?php
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'crm_accounts';

    public static function asArray()
    {
        global $workspace_id;
        return Contact::where('workspace_id',$workspace_id)
            ->keyBy('id')
            ->toArray();
    }

    public static function getAllContacts()
    {
        global $workspace_id;
        return Contact::where('workspace_id',$workspace_id)
            ->select(['id','account','email','phone'])
            ->orderBy('id','desc')->get();
    }
}