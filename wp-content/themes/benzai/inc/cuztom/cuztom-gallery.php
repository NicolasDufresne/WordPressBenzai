<?php

$work = new Cuztom_post_type('gallery', [
    'menu_position' => 25,
    'menu_icon' => 'dashicons-instagram',
]);

$work->add_meta_box(
    'benzai-gallery',
    'Gallerie',

    array(
        array(
            'id' => '_name',
            'label' => 'Nom de la photo',
            'type' => 'name',
        ),
        array(
            'id' => '_image',
            'label' => 'Image',
            'type' => 'image',
            'description' => 'Permet d\'envoyer une image'
        ),

    ));
