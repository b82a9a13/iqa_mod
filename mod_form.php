<?php
/**
 * @package     mod_iqa
 * @author      Robert Tyrone Cullen
 * @var stdClass $plugin
 */
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');
require_once($CFG->dirroot.'/mod/iqa/lib.php');

class mod_iqa_mod_form extends moodleform_mod {
    function definition(){
        global $CFG, $DB;
        $mform = $this->_form;
        $mform->addElement('text', 'name', get_string('iqa_assignment_name', 'iqa'), array('size' => '48'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        $this->standard_coursemodule_elements();
        $this->add_action_buttons();
    }
}