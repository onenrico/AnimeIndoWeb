<?php 

    // manga scrapper
    require_once 'simple_html_dom.php';
    $listmanga = file_get_html('https://sektekomik.com/manga/?list');
    $mangas = array();
    foreach($listmanga->find('div.soralist div.blix ul li') as $rawmanga) {
        $title = $rawmanga->plaintext;
        $slug = $rawmanga->find('a',0)->href;

        $m = array();
        $m['title'] = $title;
        $m['slug'] = $slug;
        $detailmanga = file_get_html($slug);

        array_push($mangas, $m);
    }


    // save to db
    foreach($mangas as $manga){
        $title = $manga['title'];
        $slug = $manga['slug'];
        echo "<p>"+$title+" | "+$slug+"</p>"
    }
?>
