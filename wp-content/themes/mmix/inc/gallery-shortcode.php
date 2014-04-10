<?php
/**
 * The Gallery shortcode modified by sariha.
 *
 * This implements the functionality of the Gallery Shortcode for displaying
 * WordPress images on a post.
 *
 * @since 2.5.0
 *
 * @param array $attr Attributes of the shortcode.
 * @return string HTML content to display gallery.
 */

//sanitize file name
add_filter('sanitize_file_name', 'sc_remove_accents' );
function sc_remove_accents($string){
  /*
  $string = str_replace(array('[\', \']'), '', $string);
  $string = preg_replace('/\[.*\]/U', '', $string);
  $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
  $string = htmlentities($string, ENT_COMPAT, 'utf-8');
  $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
  $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
  $string =  strtolower(trim($string, '-'));
  */
  $ext = pathinfo($string, PATHINFO_EXTENSION);
  $string = sanitize_title($string);
  $string = str_replace('-'.$ext, '', $string);
  $string = $string.'.'.$ext;
  return $string;
}
// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_sc');

function gallery_shortcode_sc($attr) {
  $post = get_post();

  static $instance = 0;
  $instance++;

  if ( ! empty( $attr['ids'] ) ) {
    // 'ids' is explicitly ordered, unless you specify otherwise.
    if ( empty( $attr['orderby'] ) )
      $attr['orderby'] = 'post__in';
    $attr['include'] = $attr['ids'];
  }

  // Allow plugins/themes to override the default gallery template.
  $output = apply_filters('post_gallery', '', $attr);
  if ( $output != '' )
    return $output;

  // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
  if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( !$attr['orderby'] )
      unset( $attr['orderby'] );
  }

  extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post ? $post->ID : 0,
    'itemtag'    => 'li',
    'icontag'    => 'div',
    'captiontag' => 'div',
    'columns'    => 3,
    'size'       => 'thumb-gallery',
    'include'    => '',
    'exclude'    => '',
    'link'       => ''
  ), $attr, 'gallery'));

  $id = intval($id);
  if ( 'RAND' == $order )
    $orderby = 'none';

  if ( !empty($include) ) {
    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif ( !empty($exclude) ) {
    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  } else {
    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  }

  if ( empty($attachments) )
    return '';

  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment )
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    return $output;
  }

  $itemtag = tag_escape($itemtag);
  $captiontag = tag_escape($captiontag);
  $icontag = tag_escape($icontag);
  $valid_tags = wp_kses_allowed_html( 'post' );
  if ( ! isset( $valid_tags[ $itemtag ] ) )
    $itemtag = 'dl';
  if ( ! isset( $valid_tags[ $captiontag ] ) )
    $captiontag = 'dd';
  if ( ! isset( $valid_tags[ $icontag ] ) )
    $icontag = 'dt';

  $columns = intval($columns);
  $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
  $float = is_rtl() ? 'right' : 'left';

  $selector = "gallery-{$instance}";

  $gallery_style = $gallery_div = '';
  if ( apply_filters( 'use_default_gallery_style', true ) )
    $gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {

			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
			/* see gallery_shortcode() in wp-includes/media.php */
		</style>";
  $size_class = sanitize_html_class( $size );
  $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
  $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

  $i = 0;

  $output .= '';

  $output .= '<ul class="gallery">';

  foreach ( $attachments as $id => $attachment ) {

    $src = wp_get_attachment_image_src($id, $size, false);
    $btclass = ($src[1]==$src[2]) ? 'img-rounded' : '';

    $image_src = '<img src="'.$src[0].'" width="'.$src[1].'" height="'.$src[2].'" class="attachment-'.$size_class.' '.$btclass.'" alt="" />' ;

    //$attr = array( 'src' => $src[0] );
    //$image_src = wp_get_attachment_image( $id, $size, true , $attr);

    if ( ! empty( $link ) && 'file' === $link )
    {
      $attachementLink = wp_get_attachment_url( $id );
      $image_output = '<a href="'.$attachementLink.'" class="fancybox">'.$image_src.'</a>';
    }
    elseif (! empty( $link ) && 'none' == $link )
    {
      $image_output = $image_src;
    }
    elseif ( empty( $link ) )
    {
      $attachementLink =  wp_get_attachment_url( $id );
      $image_output = '<a href="'.$attachementLink.'"  class="fancybox" rel="post_'.$post->ID.'">'.$image_src.'</a>';
    }


    $image_meta  = wp_get_attachment_metadata( $id );

    $orientation = '';
    if ( isset( $image_meta['height'], $image_meta['width'] ) )
      $orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

    $output .= "<{$itemtag} class='gallery-item'>$image_output";
    $output .= "</{$itemtag}>";
  }
  $output .= '<br style="clear: both;" />';
  $output .= '</ul>';

  $output .= "
			<br style='clear: both;' />
		</div>\n";

  return $output;
}