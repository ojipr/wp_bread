<!--wp-content/themes/{theme-file}/footer.php-->

<!--?php wp_footer();?この結果をバッファリングしてパンくず部分のみを書き換え-->

<?php
$url = get_pagenum_link(get_query_var('page'));
if ($url != home_url().'/' && $url != home_url().'/articles' && $url != home_url().'/404.php') {
    find_breads();
} else {
    wp_footer();
}
?>