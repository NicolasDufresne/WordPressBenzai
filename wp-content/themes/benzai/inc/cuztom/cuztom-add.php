<?php

$work = new Cuztom_post_type('add', [
    'menu_position' => 30,
    'menu_icon' => 'dashicons-plus',
]);

$work->add_meta_box(
    'work_info',
    'description',

    array(
        array(
            'id' => '_numBorn',
            'label' => 'numBorn',
            'type' => 'text'
        ),
        array(
            'id' => '_volume',
            'label' => 'volume',
            'type' => 'text',
            'description' => '*int'
        ),
        array(
            'id' => '_landmark',
            'label' => 'landmark',
            'type' => 'text'
        ),
        array(
            'id' => '_collectDay',
            'label' => 'collectDay',
            'type' => 'text',
            'description' => '*int'
        ),
        array(
            'id' => '_coordinates',
            'label' => 'coordinates',
            'type' => 'text',
            'description' => '*int'
        ),
        array(
            'id' => '_damage',
            'label' => 'damage',
            'type' => 'yesno'
        ),
        array(
            'id' => '_isFull',
            'label' => 'isfull',
            'type' => 'yesno'
        ),
        array(
            'id' => '_isEnable',
            'label' => 'isEnable',
            'type' => 'yesno'
        ),
        array(
            'id' => '_nameCity',
            'label' => 'nameCity',
            'type' => 'text'
        ),
        array(
            'id' => '_countryCode',
            'label' => 'countrycode',
            'type' => 'text',
            'description' => '*int'
        ),

    )
);