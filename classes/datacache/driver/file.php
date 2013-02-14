<?php

class Datacache_Driver_File implements Datacache_Driver {

    private $path = 'cache';

    /**
     * Saves data into cache
     * @param	string $id					A unique identifer for a cache data
     * @param	Datacache_Item $data					Item to cache
     * @return	bool						Returns true if successful otherwise false
     * @throws	Datacache_CanNotSave        This is thrown when the cache data can not be saved
     */
    public function save($id, Datacache_Item $data) {
        $data = serialize($data);
        $filename = $this->filename($id);
        if (!realpath($this->path))
            throw new Datacache_CanNotSave('Cache path does not exist. ' . $filename);

        if (!is_writable($this->path))
            throw new Datacache_CanNotSave('Can not save file to ' . $filename);

        $result = @file_put_contents($filename, $data);

        if ($result === false)
            throw new Datacache_CanNotSave('Can not save file to ' . $filename);

        return true;
    }

    /**
     * Gets data from cache
     * @param	string $id	A unique identifer for a cache data
     * @return	mixed		The cached data
     * @throws	Datacache_ItemNotFound This is thrown when the cache data does not exist
     */
    public function get($id) {
        $filename = $this->filename($id);
        if (!file_exists($filename))
            throw new Datacache_ItemNotFound('Cache data does not exist');

        $data = file_get_contents($filename);
        return unserialize($data);
    }

    /**
     * Either returns or set the cache path
     * @param  string $path A path to store cache data
     * @return string|void  Cache path
     */
    public function path($path = false) {
        if ($path === false)
            return $this->path;
        $path = rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $this->path = $path;
    }

    /**
     * Generate the filename for the cached data
     * @param  string $id A unique identifer for a cache data
     * @return string     Filename for the cache file
     */
    private function filename($id) {
        return $this->path . md5($id) . '.cache';
    }

}
