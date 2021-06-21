<?php

/**
 * @package  local_message
 * @copyright 2021,kandji
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @var stdClass $plugin
 */


/*
function local_message_before_footer()
{
    global $DB;
    $messages= $DB->get_records('webside_test');
    $choices=[];
    $choices[0]=\core\output\notification::NOTIFY_SUCCESS;
    $choices[1]=\core\output\notification::NOTIFY_WARNING;
    $choices[2]=\core\output\notification::NOTIFY_ERROR;
    $choices[3]=\core\output\notification::NOTIFY_INFO;
    $text =\core\output\notification::NOTIFY_SUCCESS;

    foreach ($messages as $message) {
        switch ($message->messagetype) {
            case 0:
                $text = $choices[0];
                break;
            case 1:
                $text = $choices[1];
                break;
            case 2:
                $text = $choices[2];
                break;
            case 3:
                $text = $choices[3];
                break;
        }
        \core\notification::add('bonjour vous avez activer webside', $text);
    }
}

*/