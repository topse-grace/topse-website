<?php
/*
 * INTER-Mediator Ver.@@@@2@@@@ Released @@@@1@@@@
 *
 *   by Masayuki Nii  msyk@msyk.net Copyright (c) 2012 Masayuki Nii, All rights reserved.
 *
 *   This project started at the end of 2009.
 *   INTER-Mediator is supplied under MIT License.
 */
require_once('INTER-Mediator/INTER-Mediator.php');

IM_Entry(
    array(
        array(
            'name' => 'pagebuilder',
            'extending-class' => "PageFragments",
        ),
        array(
            'name' => 'newslist',
            'extending-class' => "PageFragments",
        ),
        array(
            "name" => "teachers2016",
            'aggregation-select' => "responsible.teacher_id, executed_year, teacher.name AS teacher_name, GROUP_CONCAT(subject.name) AS subjects, affiliation, title, photofile, focus, introduce",
            'aggregation-from' => "responsible INNER JOIN subject ON subject.subject_id = responsible.subject_id INNER JOIN teacher ON teacher.teacher_id = responsible.teacher_id",
            'aggregation-group-by' => "responsible.teacher_id",
            "query" => array(
                array("field" => "executed_year", "operator" => "=", "value" => "28"),
            ),
            "sort" => array(
                array("field" => "name_kana", "direction" => "asc"),
            ),
            "db-class" => "PDO",
        ),
    ),
    array(
    ),
    array(
        'db-class' => 'Null',
    ),
    false
);

?>