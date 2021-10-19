<?php
   return [
       [
           'label'=>'Dashboard',
           'url'=>'admin.dashboard',
           'icon'=>'fa-home'
       ],
       [
           'label'=>'Product',
           'url'=>'',
           'icon'=>'fa-shopping-cart',
            'items'=>[
                [
                    'label'=>'Danh sách sản phẩm',
                    'url'=>'product.index',
                    'icon'=>'fa-shopping-cart',
                    
                ],
                [
                    'label'=>'Thêm sản phẩm',
                    'url'=>'product.create',
                    'icon'=>'fa-book',
                ]
            ]
       ],
       [
        'label'=>'Loại sản phẩm',
        'url'=>'category.index',
        'icon'=>'fa-book',
         'items'=>[
             [
                 'label'=>'Danh sách',
                 'url'=>'category.index',
                 'icon'=>'fa-shopping-cart',
                 
             ],
             [
                 'label'=>'Thêm loại mới',
                 'url'=>'category.create',
                 'icon'=>'fa-shopping-cart',
             ]
         ]
    ],
    [
        'label'=>'Thương hiệu',
        'url'=>'brand.index',
        'icon'=>'fa-bullhorn',
         'items'=>[
             [
                 'label'=>'Danh sách thương hiệu',
                 'url'=>'brand.index',
                 'icon'=>'fa-shopping-cart',
                 
             ],
             [
                 'label'=>'Thêm thương hiệu',
                 'url'=>'brand.create',
                 'icon'=>'fa-shopping-cart',
             ]
         ]
    ]
   ]
?>