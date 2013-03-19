<?php
/**
 * Contains the index controller.
 *
 * @category    Website
 * @package     Website_Controller
 * @author      Andrew Sorensen <andrew@localcoast.net>
 *
 * @version     $Id$
 */

/**
 * The index controller.
 */
class IndexController extends Website_Controller_Action {

    public function init() {
        parent::init();

        $this->enableLayout();
    }

    /**
     * The homepage action
     */
    public function homepageAction () {

    }
}
