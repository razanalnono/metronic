<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Dashboard',
            'root' => true,
            'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*
            'page' => '/',
            'new-tab' => false,
        ],

        // Custom
        [
            'section' => 'Custom',
        ],
        [
            'title' => 'Products',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page'=>'/products',
            'bullet' => 'line',
            'root' => true,
         
        ],

        [
            'title' => 'Categories',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page'=>'/categories',
            'bullet' => 'line',
            'root' => true,
          
        ],

        [
            'title' => 'Attributes',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page' => '/attributes',
            'bullet' => 'line',
            'root' => true,

        ],


        [
            'title' => 'Variants',
            'icon' => 'media/svg/icons/Layout/Layout-4-blocks.svg',
            'page' => '/variants',
            'bullet' => 'line',
            'root' => true,

        ],
  
     
     
        

 


     
        ]
    

];