<?php

namespace Eyewitness\Eye\Witness;

class Server
{
    /**
     * Get all the server checks.
     *
     * @return array
     */
    public function check()
    {
        $data['version_php'] = phpversion();
        $data['version_laravel'] = app()->version();
        $data['reboot_required'] = $this->checkServerForRebootRequired();
        $data['cache_config'] = app()->configurationIsCached();
        $data['cache_route'] = app()->routesAreCached();
        $data['timezone'] = config('app.timezone');

        return $data;
    }

    /**
     * Check if the server reporting if it needs a reboot.
     *
     * @return boolean
     */
    public function checkServerForRebootRequired()
    {
        return file_exists('/var/run/reboot-required');
    }
}
