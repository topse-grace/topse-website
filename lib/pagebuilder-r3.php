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
            "name" => "teacherlist",
            'aggregation-select' => "responsible.teacher_id, executed_year, teacher.name AS teacher_name, GROUP_CONCAT(subject.name) AS subjects, affiliation, title, photofile, focus, introduce",
            'aggregation-from' => "responsible INNER JOIN subject ON subject.subject_id = responsible.subject_id INNER JOIN teacher ON teacher.teacher_id = responsible.teacher_id",
            'aggregation-group-by' => "responsible.teacher_id",
            "query" => array(
                array("field" => "executed_year", "operator" => "=", "value" => 2024),
                array("field" => "cate_syllabus", "operator" => "=", "value" => 1),
//                array('field' => '__operation__'),
//                array("field" => "executed_year", "operator" => "=", "value" => 30),
//                array("field" => "cate_syllabus", "operator" => "=", "value" => 1),
//                array("field" => "alternate", "operator" => "=", "value" => 1),
            ),
            "sort" => array(
                array("field" => "name_kana", "direction" => "asc"),
            ),
            "db-class" => "PDO",
        ),
        array(
            "name" => "subjectlist_next",
            "db-class" => "PDO",
            'aggregation-select' => "subject.*," .
                "GROUP_CONCAT(DISTINCT responsible_teacher.teacher_name ORDER BY responsible_teacher.ordering SEPARATOR ', ') AS teachers," .
                "course.name AS course_name, course.color AS course_color, executed_year, m_pos, wday_pos," .
                "CONCAT(executed_year,'年<br>',IF(executed_year=29,CONCAT(MOD(m_pos+3,12)+1,'月'),''),'開講') AS start_string," .
                "executed_year * 1000 + m_pos *10 + wday_pos AS sortkey",
            'aggregation-from' => "subject " .
                "LEFT OUTER JOIN responsible_teacher on responsible_teacher.subject_id=subject.subject_id " .
                "INNER JOIN course ON course.course_id=subject.course_id",
            'aggregation-group-by' => "subject.subject_id",
            "key" => "subject_id",
            "navi-control" => "master-hide",
            "records" => 100,
            "query" => array(
                array("field" => "executed_year", "operator" => "=", "value" => 2024),
                array("field" => "cate_syllabus", "operator" => "=", "value" => 1),
//                array('field' => '__operation__'),
//                array("field" => "executed_year", "operator" => "=", "value" => 31),
//                array("field" => "cate_syllabus", "operator" => "=", "value" => 1),
//                array("field" => "alternate", "operator" => "=", "value" => 1),
            ),
            "sort" => array(
                array("field" => "executed_year", "direction" => "asc"),
                array("field" => "course.ordering", "direction" => "asc"),
                array("field" => "m_pos", "direction" => "asc"),
                array("field" => "wday_pos", "direction" => "asc"),
                array("field" => "semester", "direction" => "asc"),
            ),
            "button-names" => array(
                "navi-detail" => "シラバス 表示",
            ),
            "calculation" => array(
                array(
                    "field" => "remoteStyle",
                    "expression" => "if(remote_Q1=20,'none','none')"),// always not show
                array(
                    "field" => "spec_Q41_on",
                    "expression" => "if(spec_Q4_1=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q42_on",
                    "expression" => "if(spec_Q4_2=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q43_on",
                    "expression" => "if(spec_Q4_3=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q44_on",
                    "expression" => "if(spec_Q4_4=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q45_on",
                    "expression" => "if(spec_Q4_5=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q46_on",
                    "expression" => "if(spec_Q4_6=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q47_on",
                    "expression" => "if(spec_Q4_7=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q48_on",
                    "expression" => "if(spec_Q4_8=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q49_on",
                    "expression" => "if(spec_Q4_9=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q410_on",
                    "expression" => "if(spec_Q4_10=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q411_on",
                    "expression" => "if(spec_Q4_11=1,'inline','none')",
                ),
            ),
        ),

        array(
            "name" => "subjectlist",
            "db-class" => "PDO",
            'aggregation-select' => "subject.*," .
                "GROUP_CONCAT(DISTINCT responsible_teacher.teacher_name ORDER BY responsible_teacher.ordering SEPARATOR ', ') AS teachers," .
                "course.name AS course_name, course.color AS course_color, executed_year, m_pos, wday_pos," .
                "CONCAT(executed_year,'年<br>',IF(executed_year=29,CONCAT(MOD(m_pos+3,12)+1,'月'),''),'開講') AS start_string," .
                "executed_year * 1000 + m_pos *10 + wday_pos AS sortkey",
            'aggregation-from' => "subject " .
                "LEFT OUTER JOIN responsible_teacher on responsible_teacher.subject_id=subject.subject_id " .
                "INNER JOIN course ON course.course_id=subject.course_id",
            'aggregation-group-by' => "subject.subject_id",
            "key" => "subject_id",
            "navi-control" => "master-hide",
            "records" => 100,
            "query" => array(
                array("field" => "executed_year", "operator" => "=", "value" => 2024),
                array("field" => "cate_syllabus", "operator" => "=", "value" => 1),
//                array('field' => '__operation__'),
//                array("field" => "executed_year", "operator" => "=", "value" => 31),
//                array("field" => "cate_syllabus", "operator" => "=", "value" => 1),
//                array("field" => "alternate", "operator" => "=", "value" => 1),
            ),
            "sort" => array(
                array("field" => "executed_year", "direction" => "asc"),
                array("field" => "course.ordering", "direction" => "asc"),
                array("field" => "m_pos", "direction" => "asc"),
                array("field" => "wday_pos", "direction" => "asc"),
                array("field" => "semester", "direction" => "asc"),
            ),
            "button-names" => array(
                "navi-detail" => "シラバス 表示",
            ),
            "calculation" => array(
                array(
                    "field" => "remoteStyle",
                    "expression" => "if(remote_Q1=20,'none','none')"),// always not show
                array(
                    "field" => "spec_Q41_on",
                    "expression" => "if(spec_Q4_1=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q42_on",
                    "expression" => "if(spec_Q4_2=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q43_on",
                    "expression" => "if(spec_Q4_3=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q44_on",
                    "expression" => "if(spec_Q4_4=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q45_on",
                    "expression" => "if(spec_Q4_5=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q46_on",
                    "expression" => "if(spec_Q4_6=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q47_on",
                    "expression" => "if(spec_Q4_7=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q48_on",
                    "expression" => "if(spec_Q4_8=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q49_on",
                    "expression" => "if(spec_Q4_9=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q410_on",
                    "expression" => "if(spec_Q4_10=1,'inline','none')",
                ),
                array(
                    "field" => "spec_Q411_on",
                    "expression" => "if(spec_Q4_11=1,'inline','none')",
                ),
            ),
        ),
        array(
            "name" => "subjectdetail",
            "view" => "subject",
            "table" => "dummy",
            "key" => "subject_id",
            "navi-control" => "detail",
            "records" => 1,
            "sort" => array(array("field" => "subject_id", "direction" => "asc")),
            "calculation" => array(
                array(
                    "field" => "m_pos_string",
                    "expression" => "choice(m_pos,4,5,6,7,8,9,10,11,12,1,2)"),
                array(
                    "field" => "info_string",
                    "expression" => "if(advance=1,'応用','基礎')+if(alternate=1,', 隔年','')"),
                array(
                    "field" => "Q1_string",
                    "expression" => "if(spec_Q1=1,'基礎',if(spec_Q1=2,'応用','その他'))"
                ),
                array(
                    "field" => "Q2_string",
                    "expression" => "if(spec_Q2=1,'講義のみ',if(spec_Q2=2,'演習は50%未満',if(spec_Q2=3,'演習は50%超','その他')))"
                ),
                array(
                    "field" => "Q3_string",
                    "expression" => "if(spec_Q3=1,'グループ作業は50%未満',if(spec_Q3=2,'グループ作業は50%超','その他'))"
                ),
                array(
                    "field" => "Q4_string",
                    "expression" => "if(spec_Q4=1,'事例のトピックがある',if(spec_Q4=2,'先端研究のトピックがある',if(spec_Q4=3,'網羅的である','その他')))"
                ),
                array("field" => "len_purpose", "expression" => "length(syllabus_purpose)"),
                array("field" => "style_purpose", "expression" => "if(length(syllabus_purpose)<70,'none','block')"),
                array("field" => "style_originality", "expression" => "if(length(syllabus_originality)<70,'none','block')"),
                array("field" => "style_difficulty", "expression" => "if(length(syllabus_difficulty)<70,'none','block')"),
                array("field" => "style_knowledge", "expression" => "if(length(syllabus_knowledge)<70,'none','block')"),
                array("field" => "style_prereq", "expression" => "if(length(syllabus_prereq)<70,'none','block')"),
                array("field" => "style_schedule", "expression" => "if(length(syllabus_schedule)<70,'none','block')"),
                array("field" => "style_detail", "expression" => "if(length(syllabus_detail)>=0,'none','block')"),
                array("field" => "style_effect", "expression" => "if(length(syllabus_effect)>=0,'none','block')"),
                array("field" => "style_tools", "expression" => "if(length(syllabus_tools)>=0,'none','block')"),
                array("field" => "style_eval", "expression" => "if(length(syllabus_eval)<70,'none','block')"),
                array("field" => "style_ex", "expression" => "if(length(syllabus_ex)<70,'none','block')"),
                array("field" => "style_textbooks", "expression" => "if(length(syllabus_textbooks)<70,'none','block')"),
                array("field" => "style_originality2", "expression" => "if(length(syllabus_originality)<70 || label_id=1,'none','block')"),
            ),
            "db-class" => "PDO",
        ),
        array(
            "name" => "label",
            "view" => "syllabus_label",
            "table" => "nothing_at_all",
            "key" => "label_id",
            "cache" => true,
            "relation" => array(
                array("foreign-key" => "label_id", "join-field" => "label_id", "operator" => "="),
            ),
            "db-class" => "PDO",
        ),
        array(
            "name" => "responsiblelist",
            "view" => "responsible",
            "table" => "dummy",
            "key" => "id",
            "relation" => array(
                array("foreign-key" => "subject_id", "join-field" => "subject_id", "operator" => "="),
            ),
            'sort' => array(
                array("field" => "ordering", "direction" => "asc")
            ),
            "db-class" => "PDO",
        ),
        array(
            "name" => "teachername",
            "view" => "teacher",
            "table" => "nothing_at_all",
            "key" => "teacher_id",
            'sort' => array(
                array("field" => "name_kana", "direction" => "asc")
            ),
            "relation" => array(
                array("foreign-key" => "teacher_id", "join-field" => "teacher_id", "operator" => "="),
            ),
            "db-class" => "PDO",
        ),
        array(
            "name" => "course_master",
            "view" => "course",
            "table" => "dummy",
            "cache" => true,
            "key" => "course_id",
            "relation" => array(
                array("foreign-key" => "course_id", "join-field" => "course_id", "operator" => "="),
            ),
            "db-class" => "PDO",
        ),
        array(
            "name" => "subject",
            'aggregation-select' => "s.subject_id, s.name, s.wday_pos, s.m_pos, s.m_height, s.intensive, course.color",
            'aggregation-from' => "subject AS s INNER JOIN course ON course.course_id=s.course_id",
            //'aggregation-group-by' => "subject.subject_id",
            "key" => "subject_id",
            "records" => 100,
            "query" => array(
                array("field" => "executed_year", "operator" => "=", "value" => 2024),
                array("field" => "cate_timetable", "operator" => "=", "value" => 1),
//                array("field" => "invisible", "operator" => "=", "value" => "0"),
//                array("field" => "seminar", "operator" => "=", "value" => "0"),
//                array("field" => "contest", "operator" => "=", "value" => "0"),
            ),
            "calculation" => array(
                array("field" => "pos_x", "expression" => "((wday_pos-2)*110+65+if(intensive=1,60,0)) + 'px'"),
                array("field" => "pos_y", "expression" => "((m_pos+1)*40+if(intensive=1,4,0)) + 'px'",),
                array("field" => "h", "expression" => "(m_height*40-1-if(intensive=1,8,0)) + 'px'",),
            ),
            "db-class" => "PDO",
        ),
        array(
            "name" => "subjectext",
            'aggregation-select' => "s.subject_id, s.name, s.wday_pos, s.m_pos, s.m_height, s.intensive, course.color",
            'aggregation-from' => "subject AS s INNER JOIN course ON course.course_id=s.course_id",
            //'aggregation-group-by' => "subject.subject_id",
            "key" => "subject_id",
            "records" => 100,
            "query" => array(
                array("field" => "executed_year", "operator" => "=", "value" => 2024),
                array("field" => "cate_timetable", "operator" => "=", "value" => 1),
                array("field" => "alternate", "operator" => "=", "value" => 1),
            ),
            "db-class" => "PDO",
        ),
        array(
            "name" => "subjectadv",
            'aggregation-select' => "s.subject_id, s.name, s.wday_pos, s.m_pos, s.m_height, s.intensive, course.color",
            'aggregation-from' => "subject AS s INNER JOIN course ON course.course_id=s.course_id",
            //'aggregation-group-by' => "subject.subject_id",
            "key" => "subject_id",
            "records" => 100,
            "query" => array(
                array("field" => "executed_year", "operator" => "=", "value" => 2024),
                array("field" => "cate_advonly", "operator" => "=", "value" => 1),
            ),
            "db-class" => "PDO",
        ),
        // Onetime Lecture
        array(
            "name" => "subjectonetime",
            "view" => "subject",
            "table" => "dummy",
            'aggregation-select' => "subject.*, firstdt, lecturedate",
            'aggregation-from' => "subject
                LEFT JOIN firstlecture ON firstlecture.subject_id = subject.subject_id
                LEFT JOIN alldatelecture ON alldatelecture.subject_id = subject.subject_id",
            "records" => 8,
            "query" => array(
                array("field" => "aproval_temporally_account", "operator" => "LIKE", "value" => "_%"),
                array("field" => "contest", "operator" => "=", "value" => "0"),
                array("field" => "seminar", "operator" => "=", "value" => "0"),
                array("field" => "cate_syllabus", "operator" => "=", "value" => 1),
                array("field" => "firstdt", "operator" => ">=",
                    "value" => date('Y-m-d H:i:s', strtotime('3 week', time()))),
            ),
            "sort" => array(
                array("field" => "firstdt", "direction" => "asc"),
            ),
            "db-class" => "PDO",
        ),
    ),
    array(
        'formatter' => array(
            array(
                'field' => 'subject@syllabus_purpose',
                'converter-class' => 'MarkdownString',
                'parameter' => '',
            ),
            array(
                'field' => 'subject@syllabus_originality',
                'converter-class' => 'MarkdownString',
                'parameter' => '',
            ),
            array(
                'field' => 'subject@syllabus_difficulty',
                'converter-class' => 'MarkdownString',
                'parameter' => '',
            ),
            array(
                'field' => 'subject@syllabus_knowledge',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
            array(
                'field' => 'subject@syllabus_prereq',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
            array(
                'field' => 'subject@syllabus_schedule',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
            array(
                'field' => 'subject@syllabus_detail',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
            array(
                'field' => 'subject@syllabus_effect',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
            array(
                'field' => 'subject@syllabus_tools',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
            array(
                'field' => 'subject@syllabus_eval',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
            array(
                'field' => 'subject@syllabus_ex',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
            array(
                'field' => 'subject@syllabus_textbooks',
                'converter-class' => 'MarkdownString',
                'parameter' => 'autolink',
            ),
        ),
    ),
    array(
        'db-class' => 'Null',
    ),
    false
);