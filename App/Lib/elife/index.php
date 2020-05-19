<?php


header("Content-type:text/html; charset=utf-8");
require("OpenSdk.php");

$loader  = new QmLoader;
$loader  -> autoload_path  = array(CURRENT_FILE_DIR.DS."client");
$loader  -> init();
$loader  -> autoload();

$client  = new OpenClient;
$client  -> appKey =  "10002200";
$client  -> appSecret =  "GhGIFgaFDGyLWK0I20QPgx13ZAl6pVz5";
$accessToken  = "19c2be4a5a48434eaec248daeacd022b";

//$req = new AirStationsListRequest;
////$res = $client->execute($req, $accessToken);
//$req = new AirItemsListRequest;
//$res = $client->execute($req, $accessToken);

//$req = new TrainItemsListRequest;
//$res = $client->execute($req, $accessToken);


//$req = new AirItemDetailRequest;
//$req->setItemId("5500301");
//$res = $client->execute($req, $accessToken);

//$req = new AirLinesListRequest;
//$req->setFrom("PEK");
//$req->setTo("DLC");
//$req->setDate("2019-11-27");
//$req->setItemId("5500301");
//$res = $client->execute($req, $accessToken);

//$req = new AirStationsListRequest;
//$res = $client->execute($req, $accessToken);

//$req = new AirItemDetailRequest;
//$req->setItemId("5500301");
//$res = $client->execute($req, $accessToken);


$req = new AirLinesListRequest;
$req->setFrom("PEK");
$req->setTo("DLC");
$req->setDate("2019-11-28");
$req->setItemId("5500301");
$res = $client->execute($req, $accessToken);

//$req = new AirLinesListRequest;
//
//$req->setFrom("PEK");
//$req->setTo("DLC");
//$req->setDate("2019-11-28");
//$req->setItemId("5510901");
//$res = $client->execute($req, $accessToken);
//
//$req = new AirLinesListRequest;
//$req->setFrom("PEK");
//$req->setTo("DLC");
//$req->setDate("2015-08-28");
//$req->setItemId("5510901");
//$res = $client->execute($req, $accessToken);
print_r($res);

print_r(json_encode($res));
