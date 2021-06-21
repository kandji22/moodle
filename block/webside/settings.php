<?php
if($ADMIN->fulltree)
{
    $settings->add(new admin_setting_configcheckbox('block_webside/showinformations',

    get_string('showinformations','block_webside'),get_string('description','block_webside'),0));
}