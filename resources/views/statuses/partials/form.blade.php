<div class="form-group">
    {{-- Метка к полю ввода наименования товара --}}
    {{-- На метке будет выведен перевод слова Type --}}
    {{ Form::label('name', __('Status name')) }}

    {{-- Поле ввода наименования товара --}}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
