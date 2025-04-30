<?php

require_once('../../config.php');
require_once(__DIR__ . '/form/contact_form.php');

$PAGE->set_url(new moodle_url('/local/hubspotform/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('HubSpot Contact Form');

$mform = new contact_form();

if ($mform->is_cancelled()) {
    redirect(new moodle_url('/'));
} else if ($data = $mform->get_data()) {

    $firstname = $data->firstname;
    $lastname = $data->lastname;
    $username = $data->username;
    $email = $data->email;

    $token = 'pat-na1-your_token';

    $url = 'https://api.hubapi.com/crm/v3/objects/contacts';

    $contactData = [
        'properties' => [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'username' => $username,
        ]
    ];

    $payload = json_encode($contactData);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        "Authorization: Bearer {$token}",
    ]);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo $OUTPUT->header();
    echo $OUTPUT->heading("HubSpot Contact Form");

    echo html_writer::tag('p', "First Name: $firstname");
    echo html_writer::tag('p', "Last Name: $lastname");
    echo html_writer::tag('p', "Username: $username");
    echo html_writer::tag('p', "Email: $email");

    echo html_writer::tag('p', "HubSpot response ({$httpcode}):");
    echo html_writer::tag('pre', s($response));

    echo $OUTPUT->footer();
    exit;
}

echo $OUTPUT->header();
echo $OUTPUT->heading("HubSpot Contact Form");
$mform->display();
echo $OUTPUT->footer();
