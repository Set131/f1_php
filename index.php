<?php

session_start();
require('core/controllers/page.php');
$page = new Page();
$page->load();