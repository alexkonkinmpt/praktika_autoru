{{-- Это шаблон формы редактирования товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Edit product --}}
@section('name', __('Edit status'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP PUT на веб­‑адрес: products/ID, где ID ⁠— первичный ключ товара --}}
    {{
        Form::model($status, [
            'method' => 'PUT',
            'route'  => [
                'statuses.update',
                $status->id,
            ]
        ])
    }}

    {{-- Включаем шаблон resources/views/products/partials/form.blade.php --}}
    @include('statuses.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Update status'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
