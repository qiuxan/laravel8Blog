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

        $query->when($filter['category']??false,function ($query,$category){
            $query->whereHas('category',function ($query)use ($category){return $query->where('categories.slug',$category);});
//            $query->whereExists(
//                function ($query)use ($category){
//                    return $query
//                        ->from('categories')
//                        ->whereColumn('categories.id', 'posts.category_id')
//                        ->where('categories.slug',$category);
//                }
//            );
        });

        $query->when(isset($filter['search'])?$filter['search']:false,function ($query,$search){
//            dd($search);
            $query
                ->where('title','like','%'.$search.'%')
                ->orWhere('body','like','%'.$search.'%');
        });

        $query->when($filter['author']??false,function ($query,$author){
            $query->whereHas('author',function ($query)use($author){
                return $query->where('username',$author);
            });

        });
    }
}
