<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version details.
 *
 * @package    local_codechecker
 * @copyright  WWC
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
function local_message_before_footer(){ //moodle hook
    global $DB;
    global $USER;
    $messages = $DB->get_records('local_messages');
    $sql = "SELECT lm.id,lm.message_text,lm.message_type FROM {local_messages} lm 
            LEFT JOIN {local_message_read} lmr ON lm.id=lmr.message_id
            WHERE lmr.user_id <> :user_id OR lmr.user_id IS NULL";
    $params = [
        'user_id'=>$USER->id,
    ];
    $messages = $DB->get_records_sql($sql,$params);
    $skillsarray = array(
        '0' => \core\output\notification::NOTIFY_SUCCESS,
        '1' => \core\output\notification::NOTIFY_WARNING,
        '2' => \core\output\notification::NOTIFY_INFO,
        '3' => \core\output\notification::NOTIFY_ERROR,
    );
    foreach($messages as $message){
        \core\notification::add($message->message_text,$skillsarray["$message->message_type"]);
        $readrecord = new stdClass();
        $readrecord->message_id = $message->id;
        $readrecord->user_id = $USER->id;
        $readrecord->time_read = time();
        $DB->insert_record('local_message_read', $readrecord);
    }
}
