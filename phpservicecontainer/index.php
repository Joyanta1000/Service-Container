<?php

class Container {
    private $bindings = [];

    public function bind($name, callable $callback){
        $this->bindings[$name] = $callback;
    }

    public function make($name){
        return $this->bindings[$name]();
    }
}

$app = new Container();

$app->bind("test", function(){
    return "Hello Bangladesh";
});

print_r($app->make("test"));

// 'bind' can give another data, if its called twice, but 'singleton' won't.
// instance can be used for multiple use later