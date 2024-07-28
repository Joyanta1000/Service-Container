
<?php
// example of using service container in laravel
class PersonChild{
    
}

class PersonAddress{

    public PersonChild $personChild;

    Public function __construct(PersonChild $personChild){
        $this->personChild = $personChild;
    }

    public function getAddress(): string{
        return "Daka, Bangladesh";
    }
}

class Person{
    
    public PersonAddress $personAddress;

    Public function __construct(PersonAddress $personAddress){
        $this->personAddress = $personAddress;
    }

    public function getName(): string{
        return "Person";
    }
}

app()->bind("test", function(){
    return new Person(new PersonAddress(new PersonChild()));
});
dd(app()->make("test"));
resolve('Person'); // alternative of binding