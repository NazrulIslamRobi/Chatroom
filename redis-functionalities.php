<?php


require_once('vendor/autoload.php');

$redis = new Predis\Client();

//$redis->set('key',10,'EX',10);

//$redis->del('product_id');
//$redis->expire('key',10);

//$redis->set('product_id',1);
// $redis->incr('product_id');
// $redis->incrby('product_id',5);
// $redis->decr('product_id');
//$redis->decrby('product_id',5);
//  $redis->get('product_id');


//Array store to redis

//$car = ['name'=> 'nissan', 'price'=> "500000",];

//redis->set('car',json_encode($car));

// $redis->hset('car1','name','nissan');
// $redis->hset('car1','build','2004');

// print_r( $redis->hgetall('car1'));
// echo $redis->hget('car1','name');


//$redis->hmset('car01',$car);
// print_r($redis->hgetall('car01'));
//print_r($redis->hmget('car01',['name','build']));



//chatroom


//$redis->rpush('chatroom','Jesica: i\'m doing great!');
//$redis->rpop('chatroom');
// $length = $redis->llen('chatroom');
// print_r( $redis->lrange('chatroom',0,$length));

