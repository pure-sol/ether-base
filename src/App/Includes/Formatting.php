<?php

function sanitize_key($key) {
    $raw_key = $key;
    $key = strtolower($key);
    $key = preg_replace('/[^a-z0-9_\-]/', '', $key);


    return Plugin::apply_filters('sanitize_key', $key, $raw_key);
}
