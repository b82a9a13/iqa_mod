<?php
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */
require_once('../../config.php');
require_login();

if (!$course = $DB->get_record('course', array('id'=> $id))) {
    print_error('Course ID is incorrect');
}

echo $OUTPUT->header();



echo $OUTPUT->footer();