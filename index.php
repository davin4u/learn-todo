<?php

include_once './classes/helpers.php';
include_once './classes/DB.php';
include_once './classes/Task.php';

$tasks = (new Task())->all();

$task = (new Task())->create(['Buy some food again again', 0, date('Y-m-d')]);

$task = (new Task())->find(1);

$task->toggle();



