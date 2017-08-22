<?php

namespace Eyewitness\Eye\App\Commands\Legacy;

use Illuminate\Queue\Console\WorkCommand as OriginalWorkCommand;

class LegacyWorkCommand extends OriginalWorkCommand
{
    /**
     * This extends the Work Command for applications running Laravel
     * version < 5.3.0.
     *
     * These were changes added to 5.3 onwards, so we are effectively just
     * back porting the features to ensure consistency and adding the
     * ability to effectively monitor what is required.
     *
     * We also add a small way to store the current connection *name* in
     * use, to be able to access it later in the queue process.
     *
     * @param  string  $connection
     * @param  string  $queue
     * @param  int  $delay
     * @param  int  $memory
     * @param  bool  $daemon
     * @return array
     */
    protected function runWorker($connection, $queue, $delay, $memory, $daemon = false)
    {
        if (! $daemon) {
            $this->worker->setCache($this->laravel['cache']->driver());
        }

        $connection = $this->getConnectionName($connection);
        $queue = $this->getQueue($queue, $connection);

        config(['eyewitness.temp_connection_name' => $connection]);

        return parent::runWorker($connection, $queue, $delay, $memory, $daemon);
    }

    /**
     * Get the default connection for this application.
     *
     * @param  string  $connection
     * @return string
     */
    protected function getConnectionName($connection)
    {
        return $connection ?: $this->laravel['config']['queue.default'];
    }

    /**
     * Get the queue name for the worker.
     *
     * @param  string  $queue
     * @param  string  $connection
     * @return string
     */
    protected function getQueue($queue, $connection)
    {
        return $queue ?: $this->laravel['config']->get("queue.connections.{$connection}.queue", 'default');
    }
}
