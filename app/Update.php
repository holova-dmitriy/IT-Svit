<?php

namespace App;

use MadWeb\Initializer\Contracts\Runner;

class Update
{
    public function production(Runner $run)
    {
        return $run
            ->external('composer', 'install', '--no-dev', '--prefer-dist', '--optimize-autoloader')
            ->artisan('route:cache')
            ->artisan('config:cache')
            ->artisan('migrate', ['--force' => true]); // ->artisan('horizon:terminate');
    }

    public function local(Runner $run)
    {
        return $run
            ->external('composer', 'install')
            ->artisan('migrate'); // ->artisan('horizon:terminate');
    }
}
