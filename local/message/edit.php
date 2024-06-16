<?php
/**
 * Version details.
 *
 * @package    local_codechecker
 * @copyright  WWC
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__.'/../../config.php');
require_once($CFG->dirroot.'/local/message/classes/form/edit.php');

$PAGE->set_url(new moodle_url('/local/message/edit.php'));//tell moodle our url is
$PAGE->set_context(\context_system::instance()); //what level of the site
$PAGE->set_title('Edit Message');

echo $OUTPUT->header();

//add form here
$mform = new edit();
$mform->display();


echo $OUTPUT->footer();