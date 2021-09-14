<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;
use Illuminate\Contracts\Routing\ResponseFactory;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        app()->bind('foo',function(){return 'bar';});

        //
//        app()->bind(Newsletter::class,function(){
//
//            $client= new ApiClient();
//            $client->setConfig([
//                'apiKey' => config('services.mailchimp.key'),
//                'server' => 'us5'
//            ]);
//           return new Newsletter($client);
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }
}
