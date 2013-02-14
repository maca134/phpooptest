<?php

interface Datacache_Driver {

    /**
     * Saves item into cache
     * @param  string $id		A unique identifer for a cache item
     * @param  Datacache_Item $data		Item to cache
     * @return bool				Returns true if successful otherwise false
     * @throws Datacache_CanNotSave        This is thrown when the cache data can not be saved
     */
    public function save($id, Datacache_Item $data);

    /**
     * Gets item from cache
     * @param	string $id                      A unique identifer for a cache item
     * @return	Datacache_Item                           The cached item
     * @throws  Datacache_ItemNotFound   This is thrown when the cache data does not exist
     */
    public function get($id);
}
