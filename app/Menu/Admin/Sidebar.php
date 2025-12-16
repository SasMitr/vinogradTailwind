<?php

namespace App\Menu\Admin;

use App\Support\Badge;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Sidebar
{
    public $icons = [
        'dashboard' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
              <polyline points="9 22 9 12 15 12 15 22" />
            </svg>',
        'order' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="13" height="13" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
            </svg>',
        ];

    public function __construct(
        public Badge $badges
    ) {}

    public function menu (): Collection
    {
        return Collection::make(
            [
                'dashboard' => [
                    'Аналитика' => [
                        'Сорта' => route('admin.dashboard.index'),
                        'Модификации' => route('admin.dashboard.product-modification-product'),
                        'Заказано' => route('admin.dashboard.ordered'),
                        'Всплывашки' => route('admin.dashboard.toastr'),
                        'Доставка' => 'https://tailwind/admins'
                    ]
                ],
                'catalog' => [
                    'Виноград' => [
                        'Каталог' => route('admin.product.index'),
                        'Модификации' => route('admin.modification.index'),
                        'Категории' => route('admin.category.index'),
                        'Комментарии' => route('admin.product.comment.index'),
                        'Слайдер' => 'https://tailwind/admins',
                        'Страницы' => 'https://tailwind/admins'
                    ]
                ],
                'blog' => [
                    'Блог' => [
                        'Посты' => route('admin.blog.posts'),
                        'Категории' => route('admin.blog.categories'),
                        'Комментарии' => route('admin.blog.comments')
                    ]
                ],
                'separator' => 'Apps',
                'order' => [
                    'Заказы' => route('admin.order.index')
                ],
                'delivery' => [
                    'Доставка' => 'https://tailwind/admins'
                ],
                'mails' => [
                    'Сообщения' => route('admin.messages.index')
                ]
            ]
        );
    }

    public function getActiveRazdel()
    {
        return Str::before(
            key(Arr::where(
                Arr::dot($this->menu()), function (string $value) {
                    return request()->fullUrlIs($value . '*');
                })
            ), '.'
        );
    }

    public function isActive($link): bool
    {
        $path = parse_url($link, PHP_URL_PATH) ?? '/';
        if($path === '/') {
            return request()->path() === $path;
        }
        return request()->fullUrlIs($link . '*'); // ? Почему то не работает
//        return request()->fullUrlIs($link);
    }

    public function icon($section)
    {
        if (array_key_exists($section, $this->icons)) {
            return $this->icons[$section];
        }
        return false;
    }

    public function menuHTML(): string
    {
        $menu = '';
        foreach($this->menu() as $section => $datas) {
            if (gettype($datas) == 'string') {
                $menu .= view('admin.layouts.shared._separator', ['datas' => $datas])->render();
            } else {
                foreach ($datas as $name => $items) {
                    $menu .= view('admin.layouts.shared._link-item', [
                        'items' => $items,
                        'section' => $section,
                        'menu' => $this,
                        'name' => $name,
                    ])->render();
                }
            }
        }
        return $menu;
    }
}
