<?php

class Datacache_Factory_Exception extends GeneralException {
    
}

class Datacache_Factory {

    /**
     * Sets up a new data cache object
     * @param  string		$driver Set the cache driver
     * @return Datacache	Data cache object
     */
    public static function forge($driver) {
        $driver_class = 'Datacache_Driver_' . ucwords(strtolower($driver));
        try {
            $driver = new $driver_class;
        } catch (GeneralException $e) {
            throw new Datacache_Factory_Exception('The driver ' . $driver_class . ' does not exist.' . $e);
        }
        $datacache = new Datacache($driver);
        $datacache->driver($driver);
        return $datacache;
    }

}
