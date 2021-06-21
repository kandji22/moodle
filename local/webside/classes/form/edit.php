<?php
/**
 * @package  local_message
 * @copyright 2021,kandji
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//moodleform is defined in formslib.php

require_once("$CFG->libdir/formslib.php");

class edit extends moodleform {
    //Add elements to form
    public function definition() {
        global $CFG;

        $mform = $this->_form; // Don't forget the underscore!

        $mform->addElement('text', 'messagetext', 'message text');
        $mform->setType('messagetext', PARAM_NOTAGS);
        $mform->setDefault('messagetext', get_string('enter_message','local_message'));
        $choices=[];
        $choices[0]=\core\output\notification::NOTIFY_SUCCESS;
        $choices[1]=\core\output\notification::NOTIFY_WARNING;
        $choices[2]=\core\output\notification::NOTIFY_ERROR;
        $choices[3]=\core\output\notification::NOTIFY_INFO;
        $mform->addElement('select', 'messagetype', 'Message type',$choices);
        $mform->setDefault('messagetype',3);

        $this->add_action_buttons();
    }
    //Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}