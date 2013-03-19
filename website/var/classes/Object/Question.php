<?php 

class Object_Question extends Object_Concrete {

public $o_classId = 2;
public $o_className = "Question";
public $question;
public $contact;
public $creationTime;


/**
* @param array $values
* @return Object_Question
*/
public static function create($values = array()) {
	$object = new self();
	$object->setValues($values);
	return $object;
}

/**
* @return string
*/
public function getQuestion () {
	$preValue = $this->preGetValue("question"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->question;
	 return $data;
}

/**
* @param string $question
* @return void
*/
public function setQuestion ($question) {
	$this->question = $question;
}

/**
* @return array
*/
public function getContact () {
	$preValue = $this->preGetValue("contact"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("contact")->preGetData($this);
	 return $data;
}

/**
* @param array $contact
* @return void
*/
public function setContact ($contact) {
	$this->contact = $this->getClass()->getFieldDefinition("contact")->preSetData($this, $contact);
}

/**
* @return Zend_Date
*/
public function getCreationTime () {
	$preValue = $this->preGetValue("creationTime"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->creationTime;
	 return $data;
}

/**
* @param Zend_Date $creationTime
* @return void
*/
public function setCreationTime ($creationTime) {
	$this->creationTime = $creationTime;
}

protected static $_relationFields = array (
  'contact' => 
  array (
    'type' => 'objects',
  ),
);

public $lazyLoadedFields = array (
  0 => 'contact',
);

}

