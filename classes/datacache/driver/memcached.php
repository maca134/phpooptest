<?php

class Datacache_Driver_Memcached implements Datacache_Driver {

    //private $path = 'cache';
    private $cache = null;
    
    
    function __construct() {
       if (extension_loaded ( 'memcached' )) {
            $this->cache = new Memcached;
            if ( ! $this->cache->addServer("127.0.0.1", 11211))
                throw new Datacache_Exception('Could not add Memcached server');
       } else {
            throw new Datacache_Exception('Memcached extension is not loaded');
       }
   }

    /**
     * Saves data into cache
     * @param	string $id					A unique identifer for a cache data
     * @param	Datacache_Item $data					Item to cache
     * @return	bool						Returns true if successful otherwise false
     * @throws	Datacache_CanNotSave        This is thrown when the cache data can not be saved
     */
    public function save($id, Datacache_Item $data) {
        $key = $this->key($id);
        
        //Checks whether or not this Ítem has expiration time
        if (method_exists($data, 'getExpiration'))
            $result = $this->cache->set($key, $data, $data->getExpiration());
        else
            $result = $this->cache->set($key, $data);
        
        if ( ! $result )
            throw new Datacache_CanNotSave('Cache could not be stored');
        else
            return true;
    }

    /**
     * Gets data from cache
     * @param	string $id	A unique identifer for a cache data
     * @return	mixed		The cached data
     * @throws	Datacache_ItemNotFound This is thrown when the cache data does not exist
     */
    public function get($id) {
        $key = $this->key($id);
        $cache_result = null;
        $cache_result = $this->cache->get($key); // Memcached object
        
        if(!$cache_result)
            throw new Datacache_ItemNotFound('Cache data does not exist');
        else
            return $cache_result;
    }
    
     /**
     * Generate the key for the cached data
     * @param  string $id A unique identifer for a cache data
     * @return string     Key for the cache record
     */
    private function key($id) {
        return md5($id);
    }
    
    function __destruct() {
        if ($this->cache) 
            $this->cache->quit();
   }

}
