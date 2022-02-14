<?php
//wp-content/themes/{theme-file}/functions.php
//急ぎ実装したので要修正!!!!
function find_breads() {
    ob_start();
    wp_footer();    //AIO等プラグインの意図しないパンクズの取得
    $texts = ob_get_contents();
    ob_end_clean();

    $typo = '"@type": "ListItem","position": ';

    for ($num = 10; $num > 1; $num--) {
        $texts = str_replace($typo.strval($num), $typo.strval($num + 1), $texts);
    }

    $keypara = '{"@type": "ListItem","position": 3,';
    $start = strstr($texts, $keypara);
    $inNum = strpos($texts, $start);
    $intexts = '{"@type": "ListItem","position": 2,"item":{"@id": "'.home_url().'/articles","name": "記事一覧"}},';
    $result = substr_replace($texts, $intexts, $inNum, 0);
    echo $result;
}
?>