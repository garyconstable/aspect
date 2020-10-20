<?php

/* Template Name: Homepage */

$context                        = Timber::context();
$timber_post                    = new Timber\Post();
//$timber_post->custom['what_image']   = new \Timber\Image($timber_post->custom['what_image']);
$context['post']                = $timber_post;

//echo '<pre>'.print_r($context['post'] , true).'</pre>';die();

Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'home.twig' ), $context );
