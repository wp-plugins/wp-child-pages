<?php
/* Our variables from the widget settings. */
$title = apply_filters('widget_title', $instance['title']);
$parents = $parents;
$orderby = $instance['orderby'];
$order = $instance['order'];
$thumb_size = $instance['thumb_size'];
$show_title = $instance['show_title'];
$show_excerpt = $instance['show_excerpt'];
$excerpt_lenght = $instance['excerpt_lenght'];
/* Display the widget title if one was input (before and after defined by themes). */
if ($title)
    echo $before_title . $title . $after_title;
?>
<?php
global $post;
//Here we geting current page id
$args = array(
    'sort_column' => $orderby,
    'sort_order' => $order,
    'child_of' => $post->ID
);
?>
<ul>
    <?php
    $pages = get_pages($args);
    foreach ($pages as $page) {
        $content = $page->post_content;
        ?>
        <li>
            <?php if ($show_title == 'on') { ?>
            <h4 class="media-heading">
                <a href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title; ?></a>
            </h4>
                <?php } ?>	 						
            <p>
             <?php echo get_the_post_thumbnail($page->ID, array($thumb_size, $thumb_size), array('class' => 'alignleft')); ?>
            <?php if ($show_excerpt == 'on') { ?>
               <?php echo string_limit_characters($content, $excerpt_lenght); ?>
            </p>
                <?php } ?>					
        </li>
<?php } ?>
</ul>

