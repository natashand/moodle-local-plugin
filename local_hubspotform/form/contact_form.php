<?php

require_once("$CFG->libdir/formslib.php");

class contact_form extends moodleform {
    public function definition() {
        $mform = $this->_form;

        $mform->addElement('text', 'firstname', get_string('firstname', 'local_hubspotform'));
        $mform->setType('firstname', PARAM_TEXT);
        $mform->addRule('firstname', null, 'required');

        $mform->addElement('text', 'lastname', get_string('lastname', 'local_hubspotform'));
        $mform->setType('lastname', PARAM_TEXT);
        $mform->addRule('lastname', null, 'required');

        $mform->addElement('text', 'username', get_string('username', 'local_hubspotform'));
        $mform->setType('username', PARAM_ALPHANUM);
        $mform->addRule('username', 'Required', 'required');
        $mform->addRule('username', 'Max 7 characters', 'maxlength', 7);
        $mform->addRule('username', 'Only uppercase letters allowed', 'regex', '/^[A-Z]{1,7}$/');

        $mform->addElement('text', 'email', get_string('email', 'local_hubspotform'));
        $mform->setType('email', PARAM_RAW_TRIMMED);
        $mform->addRule('email', 'Valid email required', 'required');
        $mform->addRule('email', 'Invalid format', 'regex', '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/');

        $mform->addElement('submit', 'submitbutton', get_string('submit', 'local_hubspotform'));
    }
}
