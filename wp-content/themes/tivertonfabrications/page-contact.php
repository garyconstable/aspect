<?php
/**
 * Template Name: Contact Page
 * Description: Page used for rendering out the contact form & map
 */


$context = Timber::context();

$page_post = new Timber\Post();

$context['post'] = $page_post;


Timber::render( array( 'page-contact.twig' ), $context );