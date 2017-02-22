	<form action="<?php bloginfo( 'url' ); ?>/" method="get" class="screen">
	    <fieldset>
			<!-- Aのチェックボックス -->
			<h3>A</h3>
			<div class="toggle" data-title="01">こだわらない</div>
			
			<div id="panel-01" class="hide-panel check-panel">
			<?php
		        $cats = get_categories( 'parent=70&orderby=id&hide_empty=0' );
		        foreach($cats as $cat) :
		            echo '<label>'
		            . '<input type="checkbox" value="' . $cat->cat_ID . '" name="cat[]" data-title="' .esc_html($cat->cat_name). '" /> '
		            . esc_html($cat->cat_name) . '</label>';
		        endforeach;
	        ?>
			
				<div class="toggle" data-title="01">決定してウィンドウを閉じる</div>
			</div>
			<output id="word-list-01" class="output-text"></output>
			
			<hr>
			
			<!-- Bのチェックボックス -->
			<h3>B</h3>
			<div class="toggle" data-title="02">こだわらない</div>
			
			<div id="panel-02" class="hide-panel check-panel">
			<?php
		        $cats = get_categories( 'child_of=70&orderby=id&hide_empty=0' );
		        foreach($cats as $cat) :
		            echo '<label>'
		            . '<input type="checkbox" value="' . $cat->cat_ID . '" name="cat[]" data-title="' .esc_html($cat->cat_name). '" /> '
		            . esc_html($cat->cat_name) . '</label>';
		        endforeach;
	        ?>
			
				<div class="toggle" data-title="02">決定してウィンドウを閉じる</div>
			</div>
			<output id="word-list-02" class="output-text"></output>
			
			<hr>

			<!-- Cのチェックボックス -->
			<h3>C</h3>
			<div class="toggle" data-title="03">こだわらない</div>
			
			<div id="panel-03" class="hide-panel check-panel">
			<?php
		        $cats = get_categories( 'child_of=39&orderby=id&hide_empty=0' );
		        foreach($cats as $cat) :
		            echo '<label>'
		            . '<input type="checkbox" value="' . $cat->cat_ID . '" name="cat[]" data-title="' .esc_html($cat->cat_name). '" /> '
		            . esc_html($cat->cat_name) . '</label>';
		        endforeach;
	        ?>
				<div class="toggle" data-title="03">決定してウィンドウを閉じる</div>
			</div>
			<output id="word-list-03" class="output-text"></output>
			
			<hr>
	
			<!-- Dのチェックボックス -->
			<h3>D</h3>
			<div class="toggle" data-title="04">こだわらない</div>

			<div id="panel-04" class="hide-panel check-panel">
			<?php
		        $cats = get_categories( 'child_of=17&orderby=id&hide_empty=0' );
		        foreach($cats as $cat) :
		            echo '<label>'
		            . '<input type="checkbox" value="' . $cat->cat_ID . '" name="cat[]" data-title="' .esc_html($cat->cat_name). '" /> '
		            . esc_html($cat->cat_name) . '</label>';
		        endforeach;
	        ?>
	        
				<div class="toggle" data-title="04">決定してウィンドウを閉じる</div>
			</div>
			<output id="word-list-04" class="output-text"></output>
			
			<hr>
			
			<div class="form-ttl-sub">フリーワード</div>
			
			<input class="input-front-search" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
			
			<hr>
			
			<button type="submit" class="btn">検索する</button>

	    </fieldset>
	</form>
