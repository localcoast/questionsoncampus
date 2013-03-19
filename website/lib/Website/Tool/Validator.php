<?php
/**
 * Contains the object validator.
 *
 * @category    Website
 * @package     Website_Tool
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id: Validator.php 21 2012-08-30 17:56:43Z andrew@localcoast.net $
 */
class Website_Tool_Validator {
    /**
     * Validates an object.
     *
     * @static
     * @param   $object     Object_Concrete $object
     *
     * @return  Website_Tool_Validator_Result
     */
    public static function validate(Object_Concrete $object) {
        foreach ($object->getO_class()->getFieldDefinitions() as $fieldDefinition) {
            $getter = 'get' . ucfirst ($fieldDefinition->getName());

            if (!method_exists($object, $getter)) {
                continue;
            }

            try {
                $fieldDefinition->checkValidity($object->$getter());
            } catch (Exception $e) {
                $errors[$fieldDefinition->getName()] = $e->getMessage();
            }
        }

        return new Website_Tool_Validator_Result(!(bool) count($errors), $errors);
    }

}
