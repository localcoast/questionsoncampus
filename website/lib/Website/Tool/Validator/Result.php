<?php

/**
 * Contains the result of validation
 */
class Website_Tool_Validator_Result {
    /**
     * Contains the result of the validation
     *
     * @var bool
     */
    protected $_isValid = false;

    /**
     * Contains an array of errors.
     *
     * @var array
     */
    protected $_errors = array();

    /**
     * Constructs a new validation result.
     *
     * @param   $isValid
     * @param   $errors
     */
    public function __construct($isValid, $errors) {
        $this->_isValid = $isValid;
        $this->_errors  = $errors;
    }

    /**
     * Returns whether or not the validation result was valid.
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->_isValid;
    }

    /**
     * Returns the validation errors, if any.
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->_errors;
    }

    /**
     * Returns an array of user-understandable error messages.
     */
    public function getFriendlyErrors() {
        $errors = array();

        foreach ($this->_errors as $field => $error) {
            if (preg_match('/Empty mandatory field \[ (.*) \]/', $error)) {
                $errors[$field] = 'your ' . $this->formatFieldName($field) . ' is required';
            }
        }

        return $errors;
    }

    /**
     * Returns a formatted field name.
     *
     * @param   $string
     *
     * @return  string
     */
    private function formatFieldName($string)  {
        $result = '';

        foreach (str_split($string) as $char) {
            strtoupper($char) == $char && $result && $result .= ' ';
            $result  .= strtolower($char);
        }

        return $result ;
    }
}