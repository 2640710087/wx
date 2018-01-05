<?php

return [
    'timetable.api' => [
        'class' => 'timetable.api',
        'param' => [
            'term' => [
                'must' => 'yes',
                'value_type' => 'integer',
                'value_example' => '201701',
            ],
            'time' => [
                'must' => 'no',
                'value_type' => 'string',
                'value_example' => 'day|week|all'
            ]
        ],
        'discriptions' => ''
    ]
];
