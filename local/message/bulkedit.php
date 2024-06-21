<?php

/**
 * Version details.
 *
 * @package    local_codechecker
 * @copyright  WWC
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../config.php');
require_once($CFG->dirroot . '/local/message/classes/form/bulkedit.php');

global $DB;


$PAGE->set_url(new moodle_url('/local/message/bulkedit.php')); //tell moodle our url is
$PAGE->set_context(\context_system::instance()); //what level of the site
$PAGE->set_title('Edit Message');


//add form here
$mform = new bulkedit();

// Form processing and displaying is done here.
if ($mform->is_cancelled()) {
    //go back to manage.php page
    redirect($CFG->wwwroot.'/local/message/manage.php','Cancelled the message form!');
} else if ($fromform = $mform->get_data()) {
    //insert data to database
    
    // redirect($CFG->wwwroot.'/local/message/manage.php','Successfully create a message.');
} else {
    // This branch is executed if the form is submitted but the data doesn't
    // validate and the form should be redisplayed or on the first display of the form.

    // Set anydefault data (if any).
    $mform->set_data($toform);

    // Display the form.
}
echo $OUTPUT->header();
$mform->display();
echo $OUTPUT->footer();
