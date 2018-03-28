<?php

namespace App;

use MadWeb\Initializer\Contracts\Runner;
use MadWeb\Initializer\Jobs\Supervisor\MakeQueueSupervisorConfig;
use MadWeb\Initializer\Jobs\Supervisor\MakeSocketSupervisorConfig;

class Install
{
    public function production(Runner $run)
    {
        return $run
            ->artisan('key:generate')
            ->artisan('migrate')
            ->artisan('route:cache')
            ->artisan('config:cache')
            ->external('composer', 'dump-autoload', '--optimize');
    }

    public function productionRoot(Runner $run)
    {
        return $this->localRoot($run);
    }

    public function local(Runner $run)
    {
        return $run
            ->artisan('key:generate')
            ->artisan('migrate');
    }

    public function localRoot(Runner $run)
    {
        return $run
            ->dispatch(new MakeQueueSupervisorConfig)
            ->dispatch(new MakeSocketSupervisorConfig)
            ->external('supervisorctl', 'reread')
            ->external('supervisorctl', 'update');
    }
}
