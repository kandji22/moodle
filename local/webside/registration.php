<?php
/**
 * @package  local_webside
 * @copyright 2021,kandji
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
require "$CFG->libdir/tablelib.php";
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/webside/registration.php'));

$download = optional_param('download', '', PARAM_ALPHA);

$table = new table_sql('uniqueid');
$table->is_downloading($download, 'registration', 'registration');

if (!$table->is_downloading()) {
    // Only print headers if not asked to download data
    // Print the page header
    $PAGE->set_title('registration page');
    $PAGE->set_heading('Registration table class');
    $PAGE->navbar->add('Bill', new moodle_url('/local/webside/bill.php'));
    $PAGE->navbar->add('Synchronize Registration', new moodle_url('/local/webside/syncregistration.php'));
    echo $OUTPUT->header();
}

// Work out the sql for the table.
$table->set_sql('*', "{webside_inscription}", '1=1');

$table->define_baseurl("$CFG->wwwroot/local/webside/registration.php");

$table->out(40, true);

if (!$table->is_downloading()) {
    echo $OUTPUT->footer();
}