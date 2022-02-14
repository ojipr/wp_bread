<?php
function make_bread() {

	if (!is_front_page()) {

		echo '<div class="neo_bread">';
		$breads = ['<a href="'.home_url().'">トップページ</a>'];

		$URL = $_SERVER["REQUEST_URI"];
		$categoryArr = [];
		$categoryCounter = [];
		$categories = get_the_category();

		foreach($categories as $category) {
			$categoryArr[$category->term_id] = [$category->category_nicename, $category->name];
			array_push($categoryCounter, $category->term_id);
		}

		asort($categoryCounter);
		
		$i = 0;
		$parent = '';
		foreach($categoryCounter as $num) {
			if ($i == 0) {
			array_push($breads, '<span style="margin: 0 5px; font-size: 10px;">></span><a href="'.home_url().'/'.$categoryArr[$num][0].'">'.$categoryArr[$num][1].'</a>');
			$parent = '/'.$categoryArr[$num][0];
			} elseif (strstr($URL, $categoryArr[$num][0]) || is_single()) {
			array_push($breads, '<span style="margin: 0 5px; font-size: 10px;">></span><a href="'.home_url().$parent.'/'.$categoryArr[$num][0].'">'.$categoryArr[$num][1].'</a>');		
			}
			$i++;
		}

		// トップページ > 親カテゴリ > 子カテゴリ > 記事タイトル

		if (is_single()) {
			$title = get_the_title();
			array_push($breads, '<span style="margin: 0 5px; font-size: 10px;">></span>'.$title);
		}

		foreach ($breads as $bread) {
			echo $bread;
		}

		echo '</div>';
	}
}