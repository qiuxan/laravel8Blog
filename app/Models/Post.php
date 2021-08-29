<?php
/**
 * Created by PhpStorm.
 * User: xianqiu
 * Date: 28/8/21
 * Time: 6:08 PM
 */
namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    /**
     * Post constructor.
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     * @param $slug
     */
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function find($slug){


        return static::all()->firstWhere('slug',$slug);

//        $path = resource_path('/posts/'.$slug.'.html');
//        if (!file_exists($path)){
//            throw new ModelNotFoundException();
////            dd($slug);
//        }
//        return  cache()->remember("post.{$slug}",60, function()use($path){
//           return file_get_contents($path);
//        });
    }

    public  static  function  all(){


       return collect(File::files(resource_path('/posts')))->map(function($file){
            $document=YamlFrontMatter::parseFile($file);
            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $file->getFilenameWithoutExtension());
        });

//        $files=File::files(resource_path('/posts'));
////        ddd($files);
//
//        return array_map(function ($file){
//            return $file->getContents();
//        },$files);


    }
}

