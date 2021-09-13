<?php
/**
 * Created by PhpStorm.
 * User: xianqiu
 * Date: 2021-09-13
 * Time: 14:48
 */

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{

    public function subscribe(string $email, string $list = null)
    {
        $list=$list ? $list : config('services.mailchimp.list.subscribers');
        return $this->client()->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

    protected function client()
    {
//        ddd(config('services.mailchimp.key'));
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);
    }

}