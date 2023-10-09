<?php
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */
defined('MOODLE_INTERNAL') || die();

//Get all modules for a specific course id
function get_modules($courseid): array{
    global $DB;
    $array = [];
    if($DB->record_exists('iqa', [$DB->sql_compare_text('course') => $courseid])){
        $records = $DB->get_records_sql('SELECT * FROM {iqa} WHERE course = ?',[$courseid]);
        foreach($records as $record){
            array_push($array, [$record->name, $record->id, date('d/m/Y H:m:s', $record->timemodified), date('d/m/Y H:m:s', $record->timecreated), $record->option]);
        }
    }
    return $array;
}