@extends('admin.layouts.base')

@section('title', 'Admin | Добавить сорт винограда')

@section('content')

    @include('admin.shop.product.partials._form')

@endsection

@section('style')
    <link rel="stylesheet" href="/css/choices.min.css">
@endsection

@section('scripts')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/choices.min.js"></script>

    <script>
        const multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                allowHTML: true,
                removeItemButton: true,
            }
        );

        // const element = document.querySelector('.js-choice');
        const category = new Choices('#category_id', {});
        const selection = new Choices('#selection_id', {});
        const country = new Choices('#country_id', {});

        var editor = CKEDITOR.replace('content');
        editor.config.height = '400px';
        var editor2 = CKEDITOR.replace('description');
        editor2.config.height = '400px';
    </script>
@endsection
