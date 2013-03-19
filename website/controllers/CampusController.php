<?php
/**
 * Contains the campus controller.
 *
 * @category    Website
 * @package     Website_Controller
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id: CampusController.php 27 2012-09-03 20:36:44Z andrew@localcoast.net $
 */

/**
 * The index controller.
 */
class CampusController extends Website_Controller_Action {

    /**
     * The current campus.
     *
     * @var Object_Folder
     */
    protected $_campus;

    protected $_campusFolders = array();

    /**
     * Initializes the controller.
     */
    public function init() {
        parent::init();

        $this->_campus = Object_Folder::getById(3);

        foreach ($this->_campus->getChilds() as $child) {
            $this->_campusFolders[$child->getKey()] = $child;
        }

        $this->enableLayout();
    }

    /**
     * The homepage action.
     */
	public function homepageAction () {
        $questions    = array();
        $tmpQuestions = new Object_Question_List();

        $tmpQuestions->setLimit(5);
        $tmpQuestions->setOrderKey('creationTime');

        foreach ($tmpQuestions as $question) {
            $questions[$question->getId()] = array(
                'id'            => $question->getId(),
                'question'      => $question->getQuestion(),
                'creationTime'  => $question->getCreationTime(),
            );
        }

        $this->view->questions = $questions;
	}

    /**
     * The ask question action.
     */
    public function askAction() {
        $request  = $this->getRequest();
        $question = false;

        if ($request->isPost()) {
            $question   = Object_Question::create($request->getPost('question'));
            $contact    = Object_Contact::create($request->getPost('contact'));

            $question->setKey($question->getId());
            $contact->setKey($contact->getId());

            $question->setParentId($this->_campusFolders['questions']->getId());
            $contact->setParentId($this->_campusFolders['contacts']->getId());

            $contact->setPublished(true);

            $errors = array();

            $question->setCreationTime(Zend_Date::now());

            $validationResult = Website_Tool_Validator::validate($contact);

            if ($validationResult->isValid()) {
                $contact->save();

                $question->setContact(array($contact));
            } else {
                $errors = array_merge(array('contact' => $validationResult->getFriendlyErrors()), $errors);
            }

            $validationResult = Website_Tool_Validator::validate($question);

            if ($validationResult->isValid()) {
                $question->setPublished(true);
                $question->save();

                $this->_redirect('/question/' . $question->getId());
            } else {
                $errors = array_merge(array('question' => $validationResult->getFriendlyErrors()), $errors);
            }

            $question = array(
                'question' => $request->getPost('question')['question'],
            );

            if ($request->getPost('_hide-validation_', false)) {
                $errors = array();
            }
        }

        $this->view->question = $question;
        $this->view->errors   = $errors;
    }

    /**
     * Searches for questions.
     */
    public function searchAction() {
        $request  = $this->getRequest();
        $limit    = 10;
        $response = array(
            'statusCode' => 400,
            'questions'  => array(),
        );

        try {
            if ($query = trim($request->getQuery('query'))) {
                $response['statusCode'] = 200;

                if ($newLimit = $request->getQuery('limit')) {
                    $limit = $newLimit;
                }

                $questions = new Object_Question_List();
                $questions->setLimit($limit);

                $terms = array('query' => '', 'bindings' => array());
                $first = true;

                foreach (explode(' ', $query) as $word) {
                    if (' ' === $word ) {
                        continue;
                    }

                    if (!$first) {
                        $terms['query'] .= ' OR ';
                    }

                    $terms['query']     .= 'question LIKE ?';
                    $terms['bindings'][] = '%' . $word . '%';

                    $first = false;
                }

                $questions->setCondition($terms['query'], $terms['bindings']);

                foreach ($questions as $question) {
                    $response['questions'][] = array(
                        'id'            => $question->getId(),
                        'question'      => $question->getQuestion(),
                        'creationTime'  => $question->getCreationTime(),
                    );
                }
            }
        } catch (Exception $e) {
            $response = array_merge($response,
                array(
                    'statusCode' => 500,
                    'questions'  => array()
                )
            );

        }

        $this->getResponse()->setHttpResponseCode($response['statusCode']);
        $this->getHelper('json')->sendJson($response);
    }

    /**
     * The ask question action.
     */
    public function questionAction() {
        $errors = array();
        $answer = false;
        $isNew  = false;

        $questionKey = '/campus/uwtacoma/questions/' . $this->_getParam('id');

        $question = Object_Question::getByPath($questionKey);

        if (!$question) {
            $this->getResponse()->setRedirect('/')->sendResponse();

            exit;
        }

        $tmpAnswers = new Object_Answer_List();
        $tmpAnswers->setCondition('question LIKE "%' . $question->getId() . ',%"');

        $answers = array();

        foreach ($tmpAnswers as $tmpAnswer) {
            $tmpAnswerContact = $tmpAnswer->getContact()[0];

            $answers[] = array(
                'id'            => $tmpAnswer->getId(),
                'answer'        => $tmpAnswer->getAnswer(),
                'creationTime'  => $tmpAnswer->getCreationTime(),
                'contact'       => array(
                    'fullName'  => $tmpAnswerContact->getFirstName() . ' ' . $tmpAnswerContact->getLastName(),
                ),
            );
        }

        $contact = $question->getContact()[0];

        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();

            $answer  = Object_Answer::create($request->getPost('answer'));
            $contact = Object_Contact::create($request->getPost('contact'));

            $answer->setKey($answer->getId());
            $contact->setKey($contact->getId());

            $answer->setParentId($this->_campusFolders['answers']->getId());
            $contact->setParentId($this->_campusFolders['contacts']->getId());
            $contact->setPublished(true);

            $validationResult = Website_Tool_Validator::validate($contact);

            if (!$validationResult->isValid()) {
                $errors = array_merge(array('contact' => $validationResult->getFriendlyErrors()), $errors);
            }

            $answer->setQuestion(array($question));
            $answer->setContact(array($contact));

            $answer->setCreationTime(Zend_Date::now());
            $answer->setPublished(true);

            $validationResult = Website_Tool_Validator::validate($answer);

            if (!$validationResult->isValid()) {
                $errors = array_merge(array('answer' => $validationResult->getFriendlyErrors()), $errors);
            }

            $isValid = true;
            foreach ($errors as $model) {
                if (!empty($model)) {
                    $isValid = false;
                }
            }


            if ($isValid) {
                $contact->save();

                $answer->save();

                $isNew = true;
            }

            $answer = array(
                'answer'    => $answer->getAnswer(),
                'contact'   => array(
                    'firstName' => $contact->getFirstName(),
                    'lastName'  => $contact->getLastName(),
                ),
            );
        }

        $this->view->question = array(
            'id'            => $question->getId(),
            'question'      => $question->getQuestion(),
            'creationTime'  => $question->getCreationTime(),
            'answers'       => $answers,
            'contact'       => array(
                'fullName'      => $contact->getFirstName() . ' ' . $contact->getLastName(),
            ),
        );
        $this->view->errors = $errors;
        $this->view->answer = $answer;
        $this->view->isNew  = $isNew;
    }
}
