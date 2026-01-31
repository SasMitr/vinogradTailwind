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
        'order' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15" height="15" class="main-grid-item-icon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" />
            </svg>',
        'users' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="15" height="15">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>'
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
                    'Заказы' => route('admin.orders.index')
                ],
                'delivery' => [
                    'Доставка' => 'https://tailwind/admins'
                ],
                'mails' => [
                    'Сообщения' => route('admin.messages.index')
                ],
                'users' => [
                    'Юзеры' => route('admin.users.index')
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
