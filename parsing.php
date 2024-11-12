<?php
function Parsing($src, $src2 = null){

    if($src2 == null){
$file = file_get_contents($src);

$type = "/url: https:\/\/www.themoviedb.org\/(.*)\//";
preg_match($type, $file, $Type);

$titre = "/<title>(.*)\((.*)\) .*<\/title>/";
$date = "/<span class=release_date>\((.*)\)<\/span>/";
$summary = "/<p>(.*)<\/p>/";
$status = "/<p><strong><bdi>Status<\/bdi><\/strong>(.*)<\/p>/";
$duration = "/<p><strong><bdi>Runtime<\/bdi><\/strong>(.*)<\/p>/";
$budget = "/<p><strong><bdi>Budget<\/bdi><\/strong>(.*)<\/p>/";
$revenue = "/<p><strong><bdi>Revenue<\/bdi><\/strong>(.*)<\/p>/";
$originalLanguage = "/<p><strong><bdi>Original Language<\/bdi><\/strong>(.*)<\/p>/";
$genre = "/<li><a.*href=https:\/\/www.themoviedb.org\/genre\/.*>(.*)<\/a><\/li>/";
$keywords = "/<li><a.*href=https:\/\/www.themoviedb.org\/keyword.*>(.*)<\/a><\/li>/";
$cast = "/<p><a href=https:\/\/www.themoviedb.org\/person.*>(.*)<\/a><\/p>
 <p class=character>(.*)<\/p>/";

preg_match($titre, $file, $Titre);
preg_match($date, $file, $Date);
preg_match_all($summary, $file, $Summary);
preg_match($status, $file, $Status);
preg_match($duration, $file, $Duration);
preg_match($budget, $file, $Budget);
preg_match($revenue, $file, $Revenue);
preg_match($originalLanguage, $file, $OriginalLanguage);
preg_match_all($genre, $file, $Genre);
preg_match_all($keywords, $file, $Keywords);
preg_match_all($cast, $file, $Cast);


if($Type[1] == "movie"){
    $json = json_encode(["status"=>"ok", "result" => ["movie" =>[["title" => trim($Titre[1]), "releaseDate" => $Date[1], "summary" => $Summary[1][1], "status" => trim($Status[1]), "duration" => trim($Duration[1]), "budget" => trim($Budget[1]), "revenue" => trim($Revenue[1]), "originalLanguage" => trim($OriginalLanguage[1]), "genre" => [$Genre[1][0],$Genre[1][1],$Genre[1][2],$Genre[1][3]], "keywords" => [$Keywords[1][0],$Keywords[1][1],$Keywords[1][2],$Keywords[1][3],$Keywords[1][4]], "cast" => [["name" => $Cast[1][3] , "character" => $Cast[2][3]],["name" => $Cast[1][4] , "character" => $Cast[2][4]],["name" => $Cast[1][5] , "character" => $Cast[2][5]],["name" => $Cast[1][6] , "character" => $Cast[2][6]],["name" => $Cast[1][7] , "character" => $Cast[2][7]]]]]]],JSON_PRETTY_PRINT);
    file_put_contents('result.json', $json);
}elseif($Type[1] == "tv"){
    $json =  json_encode(["status"=>"ok", "result" => ["tv" =>[["title" => trim($Titre[1]), "releaseDate" => $Date[1], "summary" => $Summary[1][1], "status" => trim($Status[1]), "duration" => trim($Duration[1]),"originalLanguage" => trim($OriginalLanguage[1]), "genre" => [$Genre[1][0],$Genre[1][1],$Genre[1][2],$Genre[1][3]], "keywords" => [$Keywords[1][0],$Keywords[1][1],$Keywords[1][2],$Keywords[1][3],$Keywords[1][4]], "cast" => [["name" => $Cast[1][2] , "character" => $Cast[2][2]],["name" => $Cast[1][3] , "character" => $Cast[2][3]],["name" => $Cast[1][4] , "character" => $Cast[2][4]],["name" => $Cast[1][5] , "character" => $Cast[2][5]],["name" => $Cast[1][6] , "character" => $Cast[2][6]]]]]]],JSON_PRETTY_PRINT);
    file_put_contents('result.json', $json);
}

}else{
    $file = file_get_contents($src);
    $file2 = file_get_contents($src2);

$type = "/url: https:\/\/www.themoviedb.org\/(.*)\//";
preg_match($type, $file, $Type);

$titre = "/<title>(.*)\((.*)\) .*<\/title>/";
$date = "/<span class=release_date>\((.*)\)<\/span>/";
$summary = "/<p>(.*)<\/p>/";
$status = "/<p><strong><bdi>Status<\/bdi><\/strong>(.*)<\/p>/";
$duration = "/<p><strong><bdi>Runtime<\/bdi><\/strong>(.*)<\/p>/";
$budget = "/<p><strong><bdi>Budget<\/bdi><\/strong>(.*)<\/p>/";
$revenue = "/<p><strong><bdi>Revenue<\/bdi><\/strong>(.*)<\/p>/";
$originalLanguage = "/<p><strong><bdi>Original Language<\/bdi><\/strong>(.*)<\/p>/";
$genre = "/<li><a.*href=https:\/\/www.themoviedb.org\/genre\/.*>(.*)<\/a><\/li>/";
$keywords = "/<li><a.*href=https:\/\/www.themoviedb.org\/keyword.*>(.*)<\/a><\/li>/";
$cast = "/<p><a href=https:\/\/www.themoviedb.org\/person.*>(.*)<\/a><\/p>
 <p class=character>(.*)<\/p>/";


preg_match($titre, $file, $Titre);
preg_match($date, $file, $Date);
preg_match_all($summary, $file, $Summary);
preg_match($status, $file, $Status);
preg_match($duration, $file, $Duration);
preg_match($budget, $file, $Budget);
preg_match($revenue, $file, $Revenue);
preg_match($originalLanguage, $file, $OriginalLanguage);
preg_match_all($genre, $file, $Genre);
preg_match_all($keywords, $file, $Keywords);
preg_match_all($cast, $file, $Cast);

preg_match($titre, $file2, $Titre2);
preg_match($date, $file2, $Date2);
preg_match_all($summary, $file2, $Summary2);
preg_match($status, $file2, $Status2);
preg_match($duration, $file2, $Duration2);
preg_match($budget, $file2, $Budget2);
preg_match($revenue, $file2, $Revenue2);
preg_match($originalLanguage, $file2, $OriginalLanguage2);
preg_match_all($genre, $file2, $Genre2);
preg_match_all($keywords, $file2, $Keywords2);
preg_match_all($cast, $file2, $Cast2);

if($Type[1] == "movie"){
    $json = json_encode(["status"=>"ok", "result" => ["movie" =>[["title" => trim($Titre[1]), "releaseDate" => $Date[1], "summary" => $Summary[1][1], "status" => trim($Status[1]), "duration" => trim($Duration[1]), "budget" => trim($Budget[1]), "revenue" => trim($Revenue[1]), "originalLanguage" => trim($OriginalLanguage[1]), "genre" => [$Genre[1][0],$Genre[1][1],$Genre[1][2],$Genre[1][3]], "keywords" => [$Keywords[1][0],$Keywords[1][1],$Keywords[1][2],$Keywords[1][3],$Keywords[1][4]], "cast" => [["name" => $Cast[1][3] , "character" => $Cast[2][3]],["name" => $Cast[1][4] , "character" => $Cast[2][4]],["name" => $Cast[1][5] , "character" => $Cast[2][5]],["name" => $Cast[1][6] , "character" => $Cast[2][6]],["name" => $Cast[1][7] , "character" => $Cast[2][7]]]]],"tv" =>[["title" => trim($Titre2[1]), "releaseDate" => $Date2[1], "summary" => $Summary2[1][1], "status" => trim($Status2[1]), "duration" => trim($Duration2[1]),"originalLanguage" => trim($OriginalLanguage2[1]), "genre" => [$Genre2[1][0],$Genre2[1][1],$Genre2[1][2],$Genre2[1][3]], "keywords" => [$Keywords2[1][0],$Keywords2[1][1],$Keywords2[1][2],$Keywords2[1][3],$Keywords2[1][4]], "cast" => [["name" => $Cast2[1][2] , "character" => $Cast2[2][2]],["name" => $Cast2[1][3] , "character" => $Cast2[2][3]],["name" => $Cast2[1][4] , "character" => $Cast2[2][4]],["name" => $Cast2[1][5] , "character" => $Cast2[2][5]],["name" => $Cast2[1][6] , "character" => $Cast2[2][6]]]]]]],JSON_PRETTY_PRINT);
    file_put_contents('result.json', $json);
}elseif($Type[1] == "tv"){
    $json = json_encode(["status"=>"ok", "result" => ["movie" =>[["title" => trim($Titre2[1]), "releaseDate" => $Date2[1], "summary" => $Summary2[1][1], "status" => trim($Status2[1]), "duration" => trim($Duration2[1]), "budget" => trim($Budget2[1]), "revenue" => trim($Revenue2[1]), "originalLanguage" => trim($OriginalLanguage2[1]), "genre" => [$Genre2[1][0],$Genre2[1][1],$Genre2[1][2],$Genre2[1][3]], "keywords" => [$Keywords2[1][0],$Keywords2[1][1],$Keywords2[1][2],$Keywords2[1][3],$Keywords2[1][4]], "cast" => [["name" => $Cast2[1][3] , "character" => $Cast2[2][3]],["name" => $Cast2[1][4] , "character" => $Cast2[2][4]],["name" => $Cast2[1][5] , "character" => $Cast2[2][5]],["name" => $Cast2[1][6] , "character" => $Cast2[2][6]],["name" => $Cast2[1][7] , "character" => $Cast2[2][7]]]]],"tv" =>[["title" => trim($Titre[1]), "releaseDate" => $Date[1], "summary" => $Summary[1][1], "status" => trim($Status[1]), "duration" => trim($Duration[1]),"originalLanguage" => trim($OriginalLanguage[1]), "genre" => [$Genre[1][0],$Genre[1][1],$Genre[1][2],$Genre[1][3]], "keywords" => [$Keywords[1][0],$Keywords[1][1],$Keywords[1][2],$Keywords[1][3],$Keywords[1][4]], "cast" => [["name" => $Cast[1][2] , "character" => $Cast[2][2]],["name" => $Cast[1][3] , "character" => $Cast[2][3]],["name" => $Cast[1][4] , "character" => $Cast[2][4]],["name" => $Cast[1][5] , "character" => $Cast[2][5]],["name" => $Cast[1][6] , "character" => $Cast[2][6]]]]]]],JSON_PRETTY_PRINT);
    file_put_contents('result.json', $json);
}
}
}

if(!isset($argv[2])){
    Parsing($argv[1]);
}else{
    Parsing($argv[1], $argv[2]);
}
