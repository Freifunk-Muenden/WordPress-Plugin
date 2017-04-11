<?php

/*
 * Plugin Name: Freifunk Muenden
 * Plugin URI: https://freifunk-muenden.de
 * Version: 1.0
 */

includeAll(realpath(dirname(__FILE__)) . '/includes');

function includeAll($dir) {
    foreach (glob($dir . '/*.php') as $filename) {
        require_once $filename;
    }
    foreach (scandir($dir) as $ff) {
        if ($ff != '.' && $ff != '..' && is_dir($dir . '/' . $ff)) {
            foreach (glob($dir . '/' . $ff . '/*.php') as $filename) {
                include_once $filename;
            }
        }
    }
}
