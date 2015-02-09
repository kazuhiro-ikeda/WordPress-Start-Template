<?php
	$range = 1;
	$pages = $wp_query->max_num_pages;
	$showitems=($range * 2) + 1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}
?>
<?php if(1 != $pages): ?>
    <div class="pagenation">
        <ul class="page_navi">
        	<?php
                if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<a href="'. get_pagenum_link(1). '">1</a>・・・';
                if($paged > 1 && $showitems < $pages) echo '<a href="'. get_pagenum_link($paged - 1). '">&lsaquo;</a>';
                for($i=1; $i <= $pages; $i++){
                    if(1 != $pages &&( !($i >= $paged + $range +1 || $i <= $paged - $range -1) || $pages <= $showitems)){
                        echo ($paged == $i) ? '<li><span>'. $i. '</span></li>' : '<li><a href="'. get_pagenum_link($i). '">'. $i. '</a></li>';
                    }
                }
                if($paged < $pages && $showitems < $pages) echo '<li><a href="'. get_pagenum_link($paged + 1). '">&rsaquo;</a></li>';
                if($paged < $pages -1 && $paged + $range -1 < $pages && $showitems < $pages) echo '・・・<li><a href="'. get_pagenum_link($pages). '">'. $wp_query->max_num_pages. '</a></li>';
             ?>
        </ul>
    </div>
<?php endif; ?>