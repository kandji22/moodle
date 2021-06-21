<?php
/**
 * @package  local_message
 * @copyright 2021,kandji
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
$PAGE->set_url(new moodle_url('/local/webside/syncregistration.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title('Edit');
global $DB;

//ici on charge les données depuis webside
$params = [
    'location' => 'http://localhost:8888/server/index.php',
    'uri' => 'urn://localhost:8888/server/client.php',
    'trace' => 1
];

$instanceof = new SoapClient(null, $params);

//$id est un exemple d'information à envoyer à l API Webside par exemple le id de l'utilisateur
$id = ['id' => 1];

//get content inscription
$contentInscription = $instanceof->__soapCall('getInscription', $id);
//Insert data into a database
$insert = new stdClass();

$insert->session=$contentInscription['session'];
$insert->statut=$contentInscription['statut'];
$insert->date_debut=$contentInscription['date_debut'];
$insert->date_fin=$contentInscription['date_fin'];

$DB->insert_record('webside_inscription',$insert);
redirect($CFG->wwwroot. '/local/webside/registration.php', get_string('update_db_webside','local_webside'));