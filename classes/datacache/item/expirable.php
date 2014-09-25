<?php

class Datacache_Item_Expirable extends Datacache_Item { 

    private $expiration = 0;
    
    /**
     * Construct
     * @param mixed $data Data to be cached
     */
    public function __construct($data, $expiration = 0) {
        parent::__construct($data);
        $this->expiration = $expiration;
    }
    
    /**
     * Sets expiration time in seconds
     * @param int $expiration
     */
    public function setExpiration($expiration) {
        $this->expiration = $expiration;
    }
    
    /**
     * Gets expiration time
     * @return int Expiration time in seconds
     */
    public function getExpiration() {
        return $this->expiration;
    }

}

