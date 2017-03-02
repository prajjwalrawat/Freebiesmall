<?php
class CGD_Arrange_Walker extends Walker_Category {
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		extract($args);
		
		$data = '<div><i class="sort-icon"></i>';
		$data .=  $category->name; 
		$data .= '<input type="hidden" name="sa-term[]" value="' . $category->term_id . '" /></div>';
							
		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			
			//$output .=  ' data-term-id="' . $category->term_id . '"';
			$output .= ">$data\n";
			
		} else {
			$output .= "\t$data<br />\n";
		}
	}

}