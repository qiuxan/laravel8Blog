<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{


    public $guarded=[];
    use HasFactory;
    protected $with=['category','author'];
    public function category(){

        return $this->belongsTo(category::class);
    }

    public function author(){
        return $this->belongsTo(user::class,'user_id');
    }

    public function scopeFilter($query,array $filter){
//        dd();
//        $query->when($filter['search']??false,function ($query,$search){
////            dd($search);
//            $query
//                ->where('title','like','%'.$search.'%')
//                ->orWhere('body','like','%'.$search.'%');
//        });

        $query->when(isset($filter['search'])?$filter['search']:false,function ($query,$search){
//            dd($search);
            $query
                ->where('title','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%');
        });



    }
}
