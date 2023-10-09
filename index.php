<?php
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */
// This page lists all the instances of iqa in a particular course
//Require files which are used
require_once('../../config.php');
require_once($CFG->dirroot.'/mod/iqa/locallib.php');
//Get required id paramater
$id = required_param('id', PARAM_INT);
//Check if a course with the id provided exists
if (!$course = $DB->get_record('course', array('id'=> $id))) {
    print_error('Course ID is incorrect');
}
//Require a course login
require_course_login($course, true);
//Define capability and check for it and require if they have it
$context = context_course::instance($id);
if(!has_capability('mod/lesson:addinstance', $context)){
    print_error('You do not have the required capability');
}
require_capability('mod/lesson:addinstance', $context);
$p = 'mod_iqa';
$modname = get_string('modulenameplural', $p);

//Define page variables
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url("/mod/iqa/index.php?id=$id"));
$PAGE->set_pagelayout('incourse');
$PAGE->set_title("$course->shortname : $modname");
$PAGE->set_heading($course->fullname);

//Output data to the page
echo $OUTPUT->header();

$template = (Object)[
    'modname' => $modname,
    'array' => array_values(get_modules($id))
];
echo $OUTPUT->render_from_template('iqa/index', $template);

echo $OUTPUT->footer();