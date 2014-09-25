<?php

class Datacache_Item implements Serializable {

    protected $data = false;

    /**
     * Construct
     * @param mixed $data Data to be cached
     */
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Serializes the data
     * @return string Serialized data
     */
    public function serialize() {
        $data = serialize(array('d' => $this->data));
        return $data;
    }

    /**
     * Sets object up after unserializing
     * @param type $serialized
     */
    public function unserialize($serialized) {
        $data = unserialize($serialized);
        $this->data = $data['d'];
    }

    /**
     * Returns the cached data
     * @return mixed The cached data
     */
    public function __invoke() {
        return $this->data;
    }

}
