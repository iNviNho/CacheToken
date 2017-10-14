<?php

namespace CacheToken;

use Nette\Caching\Cache,
    Nette\Utils\DateTime,
    Nette\Caching\IStorage;

/**
 * Description of AutoSynchro
 *
 * @author Vladimír Vráb <www.artexe.sk>
 */
class CacheToken {
    
    /** @var Nette\Caching\Cache */
    private $cache;
    
    /** @var string */
    private $name;
    
    public function __construct(IStorage $storage, $name) {
        $this->cache = new Cache($storage, $name);        
    }
    
    public function getTimeStamp() {
        
       $timestamp = $this->cache->load($this->name);
        if (is_null($timestamp)) {
            $datetime = new DateTime;
            $timestamp = $this->cache->save($this->name, $datetime->getTimestamp());
        }    
       
        return $timestamp;
    }
    
}
