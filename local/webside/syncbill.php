<?php
/**
 * @package  local_message
 * @copyright 2021,kandji
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__.'/../../config.php');
$PAGE->set_url(new moodle_url('/local/webside/syncbill.php'));
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

//get content facture
$contentFactrue = $instanceof->__soapCall('getFacture', $id);
//Insert data into a database
$insertFacture = new stdClass();

$insertFacture->date=$contentFactrue['date_debut'];
$insertFacture->echeance=$contentFactrue['date_fin'];
$insertFacture->destinataire=$contentFactrue['destinataire'];
$insertFacture->statut=$contentFactrue['statut'];
$insertFacture->montant=$contentFactrue['montant'];

$DB->insert_record('webside_facture',$insertFacture);

redirect($CFG->wwwroot. '/local/webside/bill.php', get_string('update_db_webside','local_webside'));