{{-- Это шаблон перечня товаров из БД, свёрстанный для Bootstrap --}}

{{-- Этот шаблон расширяет (наследует) resources/views/base.blade.php --}}
@extends('base')

{{-- В секции title родительского шаблона будет выведен перевод фразы: Products --}}
@section('content', __('Messages about this car'))

{{-- В секции main родительского шаблона будет выведена форма --}}
@section('main')
    <p>
        {{-- Метод Html::secureLink(URL, надпись, атрибуты) создаёт ссылку. --}}
        {{
            Html::secureLink(
                route('messages.create'),
                __('Create message')
            )
        }}
    </p>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <tr>
                <th>{{ __('Content') }}</th>
                <th>
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true">
                    </span>
                </th>
                <th>
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">
                    </span>
                </th>
            </tr>
            @foreach ($messages as $message)
                <tr>
                    <td>{{ $message->content }}</td>
                    <td>{{ Html::secureLink(
                        route('messages.edit', $message->id),
                        __('Edit message')
                    ) }}</td>
                    <td>{{ Html::secureLink(
                        route('messages.remove', $message->id),
                        __('Remove message')
                    ) }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
