<?php

function printArrayRecursive($array, $return = false) {
    $html = "<ul>";
    foreach($array as $key => $arr) {
        $html .= "<li>";
        if( is_array( $arr ) ) {
            $html .= "<div>$key => </div>";
            $html .= printArrayRecursive( $arr, true );
        } else $html .= "<div>$key => $arr</div>";
        $html .= "</li>";
    }
    $html .= "</ul>";
    if( $return ) return $html;
    else echo $html;
}


$url="https://dev.shepherd.appoly.io/fruit.json";
$data = file_get_contents ($url);
$json = json_decode($data, true);

//print_r($json);

var_dump($json['menu_items']);

printArrayRecursive($json);
?>