PHP OOP Tasks
=============

PHP OOP Boilerplate implementing cache with files and memcached module

## Tasks

1. Create a new driver for another storage method, this can be anything you like including (memcache, apc, mysql, etc)

2. Create a new class that extends Datacache_Item and add cache expiration feature.

3. Create a factory for Datacache

## Install dependencies

### Install Memcached module on PHP

See: [PHP.net: Memcached](http://php.net/manual/en/book.memcached.php)

## Installation

You can either clone the project, download the project, or just copy & paste the files into apache document root (or virtual server directory).

## Configuration

Make sure cache directory is writable when using file cache.
