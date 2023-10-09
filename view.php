<?php
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */
require('../../config.php');
require_once('lib.php');
$id = required_param('id', PARAM_INT);
list ($course, $cm) = get_course_and_cm_from_cmid($id, 'iqa');
$iqa = $DB->get_record('iqa', array('id'=> $cm->instance), '*', MUST_EXIST);
require_login($course, true, $cm);

$context = context_module::instance($cm->instance);
require_capability('mod/iqa:view', $context);
$PAGE->set_url(new moodle_url("/mod/iqa/view.php?id=$id"));
$PAGE->set_pagelayout('incourse');

echo $OUTPUT->header();

//Add in data for when a user views the page

if(has_capability('mod/iqa:manage', $context)){
    require_capability('mod/iqa:manage', $context);
    //Add in data that allows the administration of the module
}
if(has_capability('mod/iqa:grade', $context)){
    require_capability('mod/iqa:grade', $context);
    //Add in data that allows the grading for the module
}
if(has_capability('mod/iqa:edit', $context)){
    require_capability('mod/iqa:edit', $context);
    //ADd in data that allows the editing of the module
}

echo $OUTPUT->footer();