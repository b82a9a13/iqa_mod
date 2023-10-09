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
    //Define the form fields
    function definition(){
        global $CFG;
        //Creat form variable
        $mform = $this->_form;
        //Create a name field
        $mform->addElement('text', 'name', get_string('iqa_assignment_name', 'iqa'), array('size' => '48'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        //Adds in description field
        $this->standard_intro_elements();
        //Adds in standard course module fields
        $this->standard_coursemodule_elements();
        //Adds in buttons for the form
        $this->add_action_buttons();
    }

    //Define validation
    function validation($data, $files){
        $errors = [];
        if(!preg_match("/^[0-9a-z A-Z]*$/", $data['name'])){
            $errors['name'] = 'Invalid name';
        }
        return $errors;
    }
}