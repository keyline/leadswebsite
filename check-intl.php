<?php
header('Content-Type: text/plain');

echo 'PHP version: ' . PHP_VERSION . PHP_EOL;
echo 'intl enabled: ' . (extension_loaded('intl') ? 'YES' : 'NO') . PHP_EOL;
echo 'locale function: ' . (function_exists('locale_set_default') ? 'YES' : 'NO');