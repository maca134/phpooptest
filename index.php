<?php
require 'bootstrap.php';

// Create datacache object
$datacache = Datacache_Factory::forge('memcached');
//$datacache->driver()->path('cache'); // Driver specific function

// Data to cache
$data = array('one', 'two', 'three', 'four');

// Put data into Datacache_Item object
//$item = new Datacache_Item($data);
$item = new Datacache_Item_Expirable($data, 1200);

// Saving
$datacache->save('the_cache_name', $item);
echo 'Data saved<br>';

// Fetching
$cached_data = $datacache->get('the_cache_name');
echo 'Cached data: '. print_r($cached_data, true) .'<br>';
