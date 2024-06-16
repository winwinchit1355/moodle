<?php
/**
 * Version details.
 *
 * @package    local_codechecker
 * @copyright  WWC
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__.'/../../config.php');

$PAGE->set_url(new moodle_url('/local/message/manage.php'));//tell moodle our url is
$PAGE->set_context(\context_system::instance()); //what level of the site
$PAGE->set_title('Manage Message');
echo $OUTPUT->header();
$templatecontext = (object)[
    'texttodisplay'=>'here is some text'
];
echo $OUTPUT->render_from_template('local_message/manage',$templatecontext);

echo $OUTPUT->footer();