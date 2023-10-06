<?php
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */
require('../../config.php');
require_once('lib.php');
require_login();

$id = required_param('id', PARAM_INT);
list ($course, $cm) = get_course_and_cm_from_cmid($id, 'iqa');
$iqa = $DB->get_record('iqa', array('id'=> $cm->instance), '*', MUST_EXIST);

