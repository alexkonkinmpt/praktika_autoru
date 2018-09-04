<?php

namespace App\Http\Controllers;

use App\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Извлекаем из БД коллекцию товаров,
        // отсортированных по возрастанию значений атрибута title
        $messages = Message::orderBy('title', 'ASC')->get();
        // Использовать шаблон resources/views/products/index.blade.php, где…
        return view('messages.index')->withMessages($messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // Форма добавления продукта в БД.
        // Создаём в ОЗУ новый экземпляр (объект) класса Product.
        $message = new Message();

        // Использовать шаблон resources/views/products/create.blade.php, в котором…
        return view('messages.create')->withMessage($message);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Добавление продукта в БД
        // Принимаем из формы значения полей с name, равными title, price.
        $attributes = $request->only(['content']);

        // Создаём кортеж в БД.
        $message = Message::create($attributes);

        // Создаём всплывающее сообщение об успешном сохранении в БД:
        // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
        // (см. resources/lang/ru/messages.php).
        $request->session()->flash(
            'message',
            __('Created', ['Content' => $message->content])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('messages.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $messages)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages)
    {
        //
        // Форма редактирования продукта в БД.
        // Использовать шаблон resources/views/products/edit.blade.php, в котором…
        return view('messages.edit')->withMessage($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        //
        // Редактирование продукта в БД.

       // Принимаем из формы значения полей с name, равными title, price.
       $attributes = $request->only(['content']);

       // Обновляем кортеж в БД.
       $message->update($attributes);

       // Создаём всплывающее сообщение об успешном обновлении БД
       $request->session()->flash(
           'message',
           __('Updated', ['Content' => $message->content])
       );

       // Перенаправляем клиент HTTP на маршрут с именем products.index
       // (см. routes/web.php).
       return redirect(route('messages.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages)
    {
        //
        // Удаляем товар из БД.
        $message->delete();

        // Создаём всплывающее сообщение об успешном удалении из БД
        $request->session()->flash(
            'message',
            __('Removed', ['content' => $message->content])
        );

        // Перенаправляем клиент HTTP на маршрут с именем products.index
        // (см. routes/web.php).
        return redirect(route('messages.index'));
    }

    public function remove(Message $message)
    {
        //метода, выводящего пользовательский интерфейс для удаления кортежа
        // Использовать шаблон resources/views/products/remove.blade.php, где…
        // …переменная $producs ⁠— это объект товара.
        return view('messages.remove')->withMessage($message);
    }
}
