<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);

        Post::factory(10)->create([
            'user_id' => $user->id
        ]);



//        User::truncate();
//        Category::truncate();
//        Post::truncate();

//        $user=User::factory()->create(['name'=>'johndoe']);
//        $user2=User::factory()->create();

//        Post::factory(5)->create(['user_id'=>$user->id]);
//        Post::factory(5)->create(['user_id'=>$user2->id]);

//        $user=User::factory()->create();
//        $user2=User::factory()->create();
//
//        $personal=Category::create(
//            ['name'=>'Personal','slug'=>'personal']
//        );
//        $family=Category::create(
//             ['name'=>'Family','slug'=>'family']
//        );
//        $work=Category::create(
//             ['name'=>'Work','slug'=>'work']
//        );
//
//        Post::create(
//            [
//                'user_id'=>$user->id,
//                'category_id'=>$family->id,
//                'slug'=>'my-xx-post',
//                'title'=>'my first post',
//                'excerpt'=>'first post',
//                'body'=>'<p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>',
//            ]
//        );
//
//        Post::create(
//            [
//                'user_id'=>$user2->id,
//                'category_id'=>$family->id,
//                'slug'=>'my-second-post',
//                'title'=>'my second post',
//                'excerpt'=>'second post',
//                'body'=>'<p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>',
//            ]
//        );
//
//        Post::create(
//            [
//                'user_id'=>$user->id,
//                'category_id'=>$work->id,
//                'slug'=>'my-third-post',
//                'title'=>'my third post',
//                'excerpt'=>'third post',
//                'body'=>'<p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.</p>',
//            ]
//        );
    }
}
