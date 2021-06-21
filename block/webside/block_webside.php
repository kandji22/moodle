<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package  block_webside
 * @copyright 2021,Webside SA
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_webside extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_webside');
    }

    function has_config()
    {
        return true;
    }

    function get_content()
    {
        if ($this->content !== NULL) {

            return $this->content;
        }
        $urlRegistration =new moodle_url('/local/webside/registration.php');
        $urlBill =new moodle_url('/local/webside/bill.php');
        $content = "";
       $showinformations= get_config('block_webside','showinformations');

        //here we can display the menu in block
       if($showinformations) {
           /*
           //$params à adapter avec les informations de connexion webside et de l'utilisateur en question
           $params = [
               'location' => 'http://localhost:8888/server/index.php',
               'uri' => 'urn://localhost:8888/server/client.php',
               'trace' => 1
           ];
           $instanceof = new SoapClient(null, $params);

            //$id est un exemple d'information à envoyer à l API Webside par exemple le id de l'utilisateur
           $id = ['id' => 1];
           $content='<table class="table">
        <thead>
            <tr>
                 <th scope="col">name</th>
                <th scope="col">information</th>
             </tr>
        </thead>
     <tbody>
';
           $content.='<tr>
                        <th scope="row">'.$instanceof->__soapCall('getInscription', $id).'</th>
                        <th scope="row">this is loaded from Webside </th>
                       </tr>
                      </tbody>
                     </table>';
*/
           $content='
           <div class="list-group">
                <a href="'.$urlRegistration.'" class="list-group-item list-group-item-action " >Registrations</a>
                <a href="'.$urlBill.'" class="list-group-item list-group-item-action">Bill </a>
            </div>
           ';
       }

       else{
          $content.='<p class="text-info">You can load your Webside information from Site administration / Plugins / Blocks / Webside</p>';
       }




        $this->content=  new stdClass;
        $this->content->text=$content;


        return $this->content;

    }
}
