<?php
defined('MOODLE_INTERNAL') || die();

$capabilities = [
    'local/hubspotform:view' => [
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => [
            'manager' => CAP_ALLOW,
            'user' => CAP_ALLOW,
        ],
    ],
];
