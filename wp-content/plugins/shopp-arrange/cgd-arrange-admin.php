<?php
global $CGDArrangeTerms;
?>

<div class="wrap">
<h2>CGD Arrange Terms</h2>
	<?php if ( isset($_REQUEST['taxonomy']) ): ?>
		<?php
		$taxonomy = get_taxonomy($_REQUEST['taxonomy']);
		$terms = get_terms( array($_REQUEST['taxonomy']) ); 
		?>
		<h3>Arrange Terms in <?php echo $taxonomy->labels->name; ?></h3>
		<?php if ( count($terms) > 0 ): ?>
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

				<ul class="cgd-arrange-taxonomy">
					<?php wp_list_categories( array('hide_empty' => 0,'hierarchical'=> true, 'taxonomy' => $taxonomy->name,'title_li' => '', 'walker' => new CGD_Arrange_Walker() ) ); ?>
				</ul>

				<?php wp_nonce_field( "sa_save_order" ); ?>
				<?php submit_button('Save Order'); ?>
			</form>
		<?php else: ?>
			<p>No terms found.</p>
		<?php endif; ?>
		<a href="<?php echo admin_url('admin.php?page=cgd-arrange'); ?>">&laquo; Go Back</a>

	<?php else: ?>
		<h3>Taxonomies</h3>

		<?php $taxonomies = $CGDArrangeTerms->get_setting('enabled_taxonomies'); ?>

		<table class="wp-list-table widefat fixed posts">
			<thead>
				<tr>
					<th><?php _e('Taxonomy', 'cgd_arrange'); ?></th>
					<th><?php _e('Action', 'cgd_arrange'); ?></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th><?php _e('Taxonomy', 'cgd_arrange'); ?></th>
					<th><?php _e('Action', 'cgd_arrange'); ?></th>
				</tr>
			</tfoot>
			<tbody>
				<?php if ( ! empty($taxonomies) ): ?>
					<?php foreach($taxonomies as $tax): ?>
					<?php $tax = get_taxonomy($tax); ?>
						<tr>
							<td><?php echo $tax->labels->name; ?></td>
							<td><a href="<?php echo add_query_arg( array('taxonomy' => $tax->name) ); ?>">Arrange</a></td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td>No taxonomies have been enabled for sorting. To fix this, <a href="<?php echo admin_url('admin.php?page=cgd-arrange-settings'); ?>">click here</a>.</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php endif; ?>
</div>
