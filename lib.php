<?php
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */
defined('MOODLE_INTERNAL') || die();

function iqa_add_instance($iqa){
    global $DB;
    $iqa->name = 'nmame';
    $iqa->option = 1;
    $iqa->timemodified = time();
    $iqa->timecreated = time();
    $id = $DB->insert_record('iqa', $iqa);
    return $id;
}

function iqa_update_instance(){

}

function iqa_delete_instance(){
    
}