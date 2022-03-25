<?php

function base_url() {
    return Basic::baseUrl();
}


function base_url_no() {
    return  rtrim(Basic::baseUrl(),"/");
}