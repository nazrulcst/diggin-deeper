<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    
    public function index(){


        Cache::put('cache','I am the load from cache driverI am the load from cache driverI am the load from cache driverI am the load from
         cache driverI am the load from cache driverI am the load from cache driver');
        ///Cache::add('cache2','cache key 3');//key jodi exist thake tahole kono value add kore na. key exit na thakle value add kore.
        //Cache::forever('cache','add new things');
        //jodi key exit thake tahole value replace kore dey. // jodi expire date na deya hoy tahole expire hobe na kokhono
        //exipre nai. ata manualy kora lage
        

        //Cache::forget('cache');//single cahce remove kora
        //Cache::flush();//all cache remove/delete korar jonno
        //Cache::has('cache2') //check kora hoy cache key exist ase kina.


        //Cache::put('cache','Helo');//key exit thakle valu replace kore dey na hole new create kore


       // Cache::increment('user', 1);//increment value from 0 to increment amount
        //Cache::decrement('user', 1);//decrement value from value to 0 amount
        

        // return Cache::get('cache',function(){
        //     return "Hello";
        // });//retrive cache data

        //return Cache::get('cache','Hello Bangladesh');//retrive cache data wtih data not exit return default value
        
        
        return Cache::get('cache2',function(){
            return "Bangladesh";
        });//retrive cache data


        // Cache::remember('user',$time,function(){
        //     return "Hello";
        // });//jodi
       // $cacheData = Cache::pull('cache3');///retriving daa and remove it
        //return $cacheData;
        //return 'Hello Bangladesh';
    }
}
