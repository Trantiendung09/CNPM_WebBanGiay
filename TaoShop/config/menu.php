<?php
   return [
       [
           'label'=>'Dashboard',
           'url'=>'admin.dashboard',
           'icon'=>'fa-home'
       ],
       [
           'label'=>'Product',
           'url'=>'product.index',
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
    ],
    [
        'label'=>'FileManger',
        'url'=>'admin.file',
        'icon'=>'fa-folder'
    ],
        [
            'label'=>'Đơn hàng',
             'url'=>'order.index',
             'icon'=>'fa-bars',
             'items'=>[
                 [
                    'label'=>'Đơn chờ xử lý',
                    'url'=>'order.wait',
                    'icon'=>'fa-wait'
                 ],
                 [
                    'label'=>'Đơn hoàn thành',
                    'url'=>'order.success',
                    'icon'=>'fa-success'
                 ],
                [
                    'label'=>'Đơn hàng đang xử lý ',
                    'url'=>'order.doing',
                    'icon'=>'fa-load'
                ],
             ]
            ],
        [
            'label'=>'Thống kê',
            'url'=>'thongke.index',
            'icon'=>'order.graphy',
            'items'=>[
                [
                'label'=>'Thống kê',
                'url'=>'thongke.list',
                'icon'=>''
                ],
                [
                    'label'=>'Đồ thị tăng trưởng',
                    'url'=>'thongke.graph',
                    'icon'=>''
                ]
            ],
        ]
    ]
?>