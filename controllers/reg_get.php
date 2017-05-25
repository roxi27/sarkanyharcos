<?php

require_once('common/flash_data.php');

$errors = get_flash_data('errors') ?? [];

include('templates/reg.template.php');