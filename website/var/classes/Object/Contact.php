<?php 

class Object_Contact extends Object_Concrete {

public $o_classId = 1;
public $o_className = "Contact";
public $firstName;
public $lastName;
public $email;


/**
* @param array $values
* @return Object_Contact
*/
public static function create($values = array()) {
	$object = new self();
	$object->setValues($values);
	return $object;
}

/**
* @return string
*/
public function getFirstName () {
	$preValue = $this->preGetValue("firstName"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->firstName;
	 return $data;
}

/**
* @param string $firstName
* @return void
*/
public function setFirstName ($firstName) {
	$this->firstName = $firstName;
}

/**
* @return string
*/
public function getLastName () {
	$preValue = $this->preGetValue("lastName"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->lastName;
	 return $data;
}

/**
* @param string $lastName
* @return void
*/
public function setLastName ($lastName) {
	$this->lastName = $lastName;
}

/**
* @return string
*/
public function getEmail () {
	$preValue = $this->preGetValue("email"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->email;
	 return $data;
}

/**
* @param string $email
* @return void
*/
public function setEmail ($email) {
	$this->email = $email;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

