<?php 

class Object_Answer extends Object_Concrete {

public $o_classId = 3;
public $o_className = "Answer";
public $question;
public $contact;
public $answer;
public $creationTime;


/**
* @param array $values
* @return Object_Answer
*/
public static function create($values = array()) {
	$object = new self();
	$object->setValues($values);
	return $object;
}

/**
* @return array
*/
public function getQuestion () {
	$preValue = $this->preGetValue("question"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("question")->preGetData($this);
	 return $data;
}

/**
* @param array $question
* @return void
*/
public function setQuestion ($question) {
	$this->question = $this->getClass()->getFieldDefinition("question")->preSetData($this, $question);
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
* @return string
*/
public function getAnswer () {
	$preValue = $this->preGetValue("answer"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->answer;
	 return $data;
}

/**
* @param string $answer
* @return void
*/
public function setAnswer ($answer) {
	$this->answer = $answer;
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
  'question' => 
  array (
    'type' => 'objects',
  ),
  'contact' => 
  array (
    'type' => 'objects',
  ),
);

public $lazyLoadedFields = array (
  0 => 'question',
);

}

