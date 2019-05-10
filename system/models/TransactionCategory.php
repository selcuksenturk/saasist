<?php
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    protected $table = 'sys_cats';


    public static function expense(){

        global $workspace_id;

       return self::where('workspace_id',$workspace_id)->where('type','Expense')->get();

    }


    public static function sumExpenseCategory($cat_name){

        global $workspace_id;

       return Transaction::where('workspace_id',$workspace_id)->where('category',$cat_name)->sum('amount');

    }


}