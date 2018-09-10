{{-- Это шаблон формы добавления товара в БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Create product --}}
@section('name', __('Create type'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')

    {{-- Форма предъявляется методом HTTP POST на маршрут products.create --}}
    {{
        Form::model($types, [
            'method' => 'POST',
            'route'  => 'types.store'
        ])
    }}

    {{-- Включаем шаблон resources/views/products/partials/form.blade.php --}}
    @include('types.partials.form')

    {{-- Кнопка предъявления формы --}}
    {{
        Form::submit(
            __('Create type'),
            [
                'class' => 'btn btn-block btn-success',
            ]
        )
    }}

    {{ Form::close() }}
@endsection
