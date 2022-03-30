<?php

function base_url() {
    return Basic::baseUrl();
}

function view($file, $data) {
    return Basic::view($file, $data);
}


function base_url_no() {
    return  rtrim(Basic::baseUrl(),"/");
}

function uri($int) {
    return Basic::segment($int);
}

function dateSql() {
    return date("Y-m-d");
}

function toSqlDate($date) {
    return date("Y-m-d",strtotime($date));
}
function dateIndo() {
    return date("d-m-Y");
}

function indoDate($date) {
    return date('d-m-Y', strtotime($date));
    // return strftime('%u %b %y', strtotime($date));
    // return time_elapsed_string($date);
}

function tglJamDate($date) {
    return date('d-M-Y H:i', strtotime($date));
    // return strftime('%u %b %y', strtotime($date));
    // return time_elapsed_string($date);
}

function indosDate($date) {
    return date('d M Y', strtotime($date));
}

function indoFullDate($date) {
    return date('d F Y', strtotime($date));
}