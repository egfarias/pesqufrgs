<?php

function queryElasticsearch ($index, $query) {
    $query["query"]["query_string"]["query"] = $query;
    $params = [];
    $params["index"] = $argv[1];
    $params["size"] = 2;
    $params["scroll"] = "30s";
    //$params["_source"] = ["doi","name","author","datePublished","type","language","country","isPartOf","unidade","releasedEvent","USP.titleSearchCrossrefDOI"];
    $params["body"] = $query;
    $cursor = $client->search($params);
}


// Set directory to ROOT
chdir('../');
// Include essencial files
require 'inc/config.php';
require 'inc/functions.php';

$query["query"]["query_string"]["query"] = "*";
$params = [];
$params["index"] = $argv[1];
$params["size"] = 2;
$params["scroll"] = "30s";
//$params["_source"] = ["doi","name","author","datePublished","type","language","country","isPartOf","unidade","releasedEvent","USP.titleSearchCrossrefDOI"];
$params["body"] = $query;

$cursor = $client->search($params);



foreach ($cursor["hits"]["hits"] as $r) {
    print_r($r["_source"]["CPF"]);
}

// while (isset($cursor['hits']['hits']) && count($cursor['hits']['hits']) > 0) {
//     $newIndex = "ibdedup";

//     $scroll_id = $cursor['_scroll_id'];

//     $cursor = $client->scroll([
//         "scroll_id" => $scroll_id,  //...using our previously obtained _scroll_id
//         "scroll" => "30s"           // and the same timeout window
//         ]
//     );

//     foreach ($cursor["hits"]["hits"] as $r) {

//         $doc["doc"] = $r["_source"];

//         if (isset($r["_source"]["doi"])) {
//             $sha256 = hash('sha256', ''.$r["_source"]["doi"].'');
//         } else {
//             $sha256 = hash('sha256', ''.$r["_source"]["name"].'');
//         }
//         $doc["doc_as_upsert"] = true;
//         $result_elastic = Elasticsearch::update($sha256, $doc, $newIndex);
//         //print_r($result_elastic);
//         //echo "<br/><br/><br/>";
//     }

// }

?>
