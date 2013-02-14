<?php
require 'bootstrap.php';

// Create datacache object
$datacache = Datacache_Factory::forge('file');
$datacache->driver()->path('cache'); // Driver specific function

// Data to cache
$data = array('one', 'two', 'three', 'four');

// Put data into Datacache_Item object
$item = new Datacache_Item($data);

// Saving
$datacache->save('the_cache_name', $item);
echo 'Data saved<br>';

// Fetching
$cached_data = $datacache->get('the_cache_name');
echo 'Cached data: '. print_r($cached_data, true) .'<br>';
