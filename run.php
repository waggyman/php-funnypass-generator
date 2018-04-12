<?php
require_once('./src/FunnyPass/Generator.php');

use FunnyPass\Generator;

$a = Generator::generate();
echo $a."\n";