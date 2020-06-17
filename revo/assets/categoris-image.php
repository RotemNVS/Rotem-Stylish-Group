<?php


define('revo_IMAGE_PLACEHOLDER', esc_url(get_template_directory_uri() . "/img/brand.png"));


add_action('admin_init', 'revo_init');
function revo_init()
{
    $revo_taxonomies = get_taxonomies();
    if (is_array($revo_taxonomies)) {
        $revo__options = get_option('revo_options');
        if (empty($revo__options['excluded_taxonomies']))
            $revo__options['excluded_taxonomies'] = array();

        foreach ($revo_taxonomies as $revo_taxonomy) {
            if (in_array($revo_taxonomy, $revo__options['excluded_taxonomies']))
                continue;
            add_action($revo_taxonomy . '_add_form_fields', 'revo_add_texonomy_field');
            add_action($revo_taxonomy . '_edit_form_fields', 'revo_edit_texonomy_field');
            add_filter('manage_edit-' . $revo_taxonomy . '_columns', 'revo_taxonomy_columns');
            add_filter('manage_' . $revo_taxonomy . '_custom_column', 'revo_taxonomy_column', 10, 3);
        }
    }
}


// add image field in add form
function revo_add_texonomy_field()
{
    if (get_bloginfo('version') >= 3.5)
        wp_enqueue_media();
    else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
    }

    echo '<div class="form-field">
		<label for="taxonomy_image">' . esc_html__('Image', 'revo') . '</label>
		<input type="text" name="taxonomy_image" id="taxonomy_image" value="" />
		<br/>
		<button class="revo_upload_image_button button">' . esc_html__('Upload/Add image', 'revo') . '</button>
	</div>' ;
}

// add image field in edit form
function revo_edit_texonomy_field($taxonomy)
{
    if (get_bloginfo('version') >= 3.5)
        wp_enqueue_media();
    else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('thickbox');
    }

    if (revo_taxonomy_image_url($taxonomy->term_id, NULL, TRUE) == revo_IMAGE_PLACEHOLDER)
        $image_url = "";
    else
        $image_url = revo_taxonomy_image_url($taxonomy->term_id, NULL, TRUE);
    echo '<tr class="form-field">
		<th scope="row" valign="top"><label for="taxonomy_image">' . esc_html__('Image', 'revo') . '</label></th>
		<td><img class="taxonomy-image" src="' . revo_taxonomy_image_url($taxonomy->term_id, 'medium', TRUE) . '"/><br/><input type="text" name="taxonomy_image" id="taxonomy_image" value="' . $image_url . '" /><br />
		<button class="revo_upload_image_button button">' . esc_html__('Upload/Add image', 'revo') . '</button>
		<button class="revo_remove_image_button button">' . esc_html__('Remove image', 'revo') . '</button>
		</td>
	</tr>';
}


// save our taxonomy image while edit or save term
add_action('edit_term', 'revo_save_taxonomy_image');
add_action('create_term', 'revo_save_taxonomy_image');
function revo_save_taxonomy_image($term_id)
{
    if (isset($_POST['taxonomy_image']))
        update_option('revo_taxonomy_image' . $term_id, sanitize_text_field($_POST['taxonomy_image']), NULL);
}

// get attachment ID by image url
function revo_get_attachment_id_by_url($image_src)
{
    global $wpdb;
    $id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid = %s", $image_src));
    return (!empty($id)) ? $id : NULL;
}

// get taxonomy image url for the given term_id (Place holder image by default)
function revo_taxonomy_image_url($term_id = NULL, $size = 'full', $return_placeholder = FALSE)
{
    if (!$term_id) {
        if (is_category())
            $term_id = get_query_var('cat');
        elseif (is_tag())
            $term_id = get_query_var('tag_id');
        elseif (is_tax()) {
            $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $term_id = $current_term->term_id;
        }
    }

    $taxonomy_image_url = get_option('revo_taxonomy_image' . $term_id);
    if (!empty($taxonomy_image_url)) {
        $attachment_id = revo_get_attachment_id_by_url($taxonomy_image_url);
        if (!empty($attachment_id)) {
            $taxonomy_image_url = wp_get_attachment_image_src($attachment_id, $size);
            $taxonomy_image_url = $taxonomy_image_url[0];
        }
    }

    if ($return_placeholder)
        return ($taxonomy_image_url != '') ? esc_url($taxonomy_image_url) : esc_url(revo_IMAGE_PLACEHOLDER);
    else
        return esc_url($taxonomy_image_url);
}

function revo_quick_edit_custom_box($column_name, $screen, $name)
{
    if ($column_name == 'thumb')
        echo '<fieldset>
		<div class="thumb inline-edit-col">
			<label>
				<span class="title"><img src="" alt=""/></span>
				<span class="input-text-wrap"><input type="text" name="taxonomy_image" value="" class="tax_list" /></span>
				<span class="input-text-wrap">
					<button class="revo_upload_image_button button">' . esc_html__('Upload/Add image', 'revo') . '</button>
					<button class="revo_remove_image_button button">' . esc_html__('Remove image', 'revo') . '</button>
				</span>
			</label>
		</div>
	</fieldset>';
}

/**
 * Thumbnail column added to category admin.
 *
 * @access public
 * @param mixed $columns
 * @return void
 */
function revo_taxonomy_columns($columns)
{
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumb'] = esc_html__('Image', 'revo');

    unset($columns['cb']);

    return array_merge($new_columns, $columns);
}

/**
 * Thumbnail column value added to category admin.
 *
 * @access public
 * @param mixed $columns
 * @param mixed $column
 * @param mixed $id
 * @return void
 */
function revo_taxonomy_column($columns, $column, $id)
{
    if ($column == 'thumb')
        $columns = '<span><img src="' . revo_taxonomy_image_url($id, 'thumbnail', TRUE) . '" alt="' . esc_html__('Thumbnail', 'revo') . '" class="wp-post-image" /></span>';

    return $columns;
}

// Change 'insert into post' to 'use this image'
function revo_change_insert_button_text($safe_text, $text)
{
    return str_replace("Insert into Post", "Use this image", $text);
}

// Style the image in category list
if (strpos($_SERVER['SCRIPT_NAME'], 'edit-tags.php') > 0) {

    add_action('quick_edit_custom_box', 'revo_quick_edit_custom_box', 10, 3);
    add_filter("attribute_escape", "revo_change_insert_button_text", 10, 2);
}





// Settings section description
function revo_section_text()
{
    echo '<p>' . esc_html__('Please select the taxonomies you want to exclude it from Categories Images plugin', 'revo') . '</p>';
}

// Excluded taxonomies checkboxs
function revo_excluded_taxonomies()
{
    $options = get_option('revo_options');
    $disabled_taxonomies = array('nav_menu', 'link_category', 'post_format');
    foreach (get_taxonomies() as $tax) : if (in_array($tax, $disabled_taxonomies)) continue; ?>
        <input type="checkbox" name="revo_options[excluded_taxonomies][<?php echo esc_html($tax); ?>]"
               value="<?php echo esc_html($tax); ?>" <?php checked(isset($options['excluded_taxonomies'][$tax])); ?> /> <?php echo esc_html($tax); ?>
        <br/>
    <?php endforeach;
}

// Validating options
function revo_options_validate($input)
{
    return $input;
}

// Plugin option page
function revo_options()
{
    if (!current_user_can('manage_options'))
        wp_die(esc_html__('You do not have sufficient permissions to access this page.', 'revo'));
    $options = get_option('revo_options');
    ?>
    <div class="wrap">
        <h2><?php esc_html_e('Categories Images', 'revo'); ?></h2>
        <form method="post" action="options.php">
            <?php settings_fields('revo_options'); ?>
            <?php do_settings_sections('zci-options'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// display taxonomy image for the given term_id
function revo_taxonomy_image($term_id = NULL, $size = 'full', $attr = NULL, $echo = false)
{
    if (!$term_id) {
        if (is_category())
            $term_id = get_query_var('cat');
        elseif (is_tag())
            $term_id = get_query_var('tag_id');
        elseif (is_tax()) {
            $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $term_id = $current_term->term_id;
        }
    }

    $taxonomy_image_url = get_option('revo_taxonomy_image' . $term_id);
    if (!empty($taxonomy_image_url)) {
        $attachment_id = revo_get_attachment_id_by_url($taxonomy_image_url);
        if (!empty($attachment_id))
            $taxonomy_image = wp_get_attachment_image($attachment_id, $size, FALSE, $attr);
    }

    if ($echo)
        echo  esc_url($taxonomy_image_url);
    else
        return $taxonomy_image_url;
}