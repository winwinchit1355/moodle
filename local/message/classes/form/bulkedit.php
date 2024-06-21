<?php

/**
 * Version details.
 *
 * @package    local_codechecker
 * @copyright  WWC
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


// moodleform is defined in formslib.php
require_once("$CFG->libdir/formslib.php");

class bulkedit extends moodleform {
    // Add elements to form.
    public function definition() {
        // A reference to the form is stored in $this->form.
        // A common convention is to store it in a variable, such as `$mform`.
        $mform = $this->_form; // Don't forget the underscore!
        // Add elements to your form.
        $mform->addElement('text', 'messagetext', get_string('message_text','local_message'));
        // Set type of element.
        $mform->setType('messagetext', PARAM_NOTAGS);
        // Default value.
        $mform->setDefault('messagetext', get_string('please_enter_message','local_message'));
        
        //select dropdown
        $skillsarray = array(
            '0' => \core\output\notification::NOTIFY_SUCCESS,
            '1' => \core\output\notification::NOTIFY_WARNING,
            '2' => \core\output\notification::NOTIFY_INFO,
            '3' => \core\output\notification::NOTIFY_ERROR,
        );
        $mform->addElement('select', 'messagetype', get_string('message_type','local_message'), $skillsarray);
        $mform->setDefault('messagetype', 1);

        //action button
        $this->add_action_buttons($cancel = true, $submitlabel=null);
    }

    // Custom validation should be added here.
    function validation($data, $files) {
        return [];
    }
}