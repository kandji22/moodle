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
$PAGE->set_url(new moodle_url('/local/webside/bill.php'));

$download = optional_param('download', '', PARAM_ALPHA);

$table = new table_sql('uniqueid');
$table->is_downloading($download, 'bill', 'bill');

if (!$table->is_downloading()) {
    // Only print headers if not asked to download data
    // Print the page header
    $PAGE->set_title('bill page');
    $PAGE->set_heading('Bill table class');
    $PAGE->navbar->add('Registration', new moodle_url('/local/webside/registration.php'));
    $PAGE->navbar->add('Synchronize Bill', new moodle_url('/local/webside/syncbill.php'));
    echo $OUTPUT->header();
}

// Work out the sql for the table.
$table->set_sql('*', "{webside_facture}", '1=1');

$table->define_baseurl("$CFG->wwwroot/local/webside/bill.php");

$table->out(40, true);

if (!$table->is_downloading()) {
    echo $OUTPUT->footer();
}