<?php
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */
defined('MOODLE_INTERNAL') || die();

//Function is called when the creation form is submitted : /course/modedit.php
function iqa_add_instance($iqa){
    global $DB;
    $iqa->option = 1;
    $iqa->timemodified = time();
    $iqa->timecreated = time();
    $id = $DB->insert_record('iqa', $iqa);
    return $id;
}

//Function is called when the update form is submitted : /course/modedit.php
function iqa_update_instance($iqa){
    global $DB;
    $iqa->id = $iqa->instance;
    $iqa->option = 1;
    $iqa->timemodified = time();
    $id = $DB->update_record('iqa', $iqa);
    return true;
}

//Function is called when the deletion form is submitted : Currently does not delete the records for some reason
function iqa_delete_instance($id){
    global $DB;
    if(!$record = $DB->get_record('iqa', array('id' => $id))){
        return false;
    }
    if(!$DB->delete_records('iqa', array('id' => $id))){
        return false;
    }
    return true;
}