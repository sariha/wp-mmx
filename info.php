<?php

$tempDir = sys_get_temp_dir();
var_dump($tempDir);
var_dump(is_writable($tempDir ));