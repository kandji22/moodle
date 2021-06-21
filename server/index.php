<?php
class index
{
    public function __construct()
    {
    }
    public function getInscription()
    {
        //search in database and return table
        return [
            'session' => '17-Alldeb',
            'statut' => 'Inscription',
            'date_debut' => date("Y-m-d H:i:s", 1624021516),
            'date_fin' => date("Y-m-d H:i:s", 1625490357)

        ];
    }

    public function getFacture()
    {
        //search in database and return table
        return [
            'date_debut' => date("Y-m-d H:i:s", 1624021516),
            'date_fin' => date("Y-m-d H:i:s", 1625490357),
            'destinataire' => 'Aliou Kandji',
            'statut' => "ouverte",
            'montant' => 50

        ];
    }
}
$params = [
    'uri' => 'http://localhost:8888/server/index.php'
];
$server = new SoapServer(null, $params);
$server->setClass('index');
$server->handle();
