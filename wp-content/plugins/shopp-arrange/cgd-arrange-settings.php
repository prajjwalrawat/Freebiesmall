<?php
global $CGDArrangeTerms;
?>
<div class="wrap">
    <h2>CGD Arrange Terms Settings</h2>

    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    	<?php $CGDArrangeTerms->the_nonce(); ?>
    	<table class="form-table">
			<tbody>
				<tr>
					<th scope="row" valign="top">Enabled Taxonomies</th>

					<td>
						<?php $taxonomies = get_taxonomies(null, 'objects'); ?>
						<?php foreach($taxonomies as $tax): ?>
							<label>
								<input type="checkbox" name="<?php echo $CGDArrangeTerms->get_field_name('enabled_taxonomies'); ?>[]" value="<?php echo $tax->name; ?>" <?php if ( is_array( $CGDArrangeTerms->get_setting('enabled_taxonomies') ) && in_array($tax->name, $CGDArrangeTerms->get_setting('enabled_taxonomies') ) ) echo 'checked="checked"'; ?> />	<?php echo $tax->labels->name; ?>
							</label><br/>
						<?php endforeach; ?>
						<p>Enables sorting <i>and</i> overrides sort order.</p>
					</td>
				</tr>
			</tbody>
    	</table>
    	<input class="button-primary" type="submit" value="Save Settings" />
    </form>
</div>
