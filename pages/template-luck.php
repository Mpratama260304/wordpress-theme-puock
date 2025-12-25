<?php
/*
Template Name: Try Your Luck
*/
$posts = get_posts('numberposts=1&orderby=rand');
foreach($posts as $post){
    header("Location:".get_the_permalink($post));
    break;
}