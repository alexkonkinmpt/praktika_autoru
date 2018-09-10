<?php

namespace App\Http\Controllers;

use App\Statuses;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         // Извлекаем из БД коллекцию товаров,
         // отсортированных по возрастанию значений атрибута title
         $status = Statuses::orderBy('name', 'ASC')->get();
         // Использовать шаблон resources/views/products/index.blade.php, где…
         return view('statuses.index')->withStatuses($status);
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         // Форма добавления продукта в БД.
         // Создаём в ОЗУ новый экземпляр (объект) класса Product.
         $status = new Statuses();

         // Использовать шаблон resources/views/products/create.blade.php, в котором…
         return view('statuses.create')->withStatuses($status);
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         // Добавление продукта в БД
         // Принимаем из формы значения полей с name, равными title, price.
         $attributes = $request->only(['name']);

         // Создаём кортеж в БД.
         $status = Statuses::create($attributes);

         // Создаём всплывающее сообщение об успешном сохранении в БД:
         // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
         // (см. resources/lang/ru/messages.php).
         $request->session()->flash(
             'message',
             __('Created', ['name' => $status->name])
         );

         // Перенаправляем клиент HTTP на маршрут с именем products.index
         // (см. routes/web.php).
         return redirect(route('statuses.index'));
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function show(Statuses $status)
     {
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function edit(Statuses $status)
     {
         // Форма редактирования продукта в БД.
         // Использовать шаблон resources/views/products/edit.blade.php, в котором…
         return view('statuses.edit')->withStatus($status);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Statuses $status)
     {
         // Редактирование продукта в БД.

         // Принимаем из формы значения полей с name, равными title, price.
         $attributes = $request->only(['name']);

         // Обновляем кортеж в БД.
         $status->update($attributes);

         // Создаём всплывающее сообщение об успешном обновлении БД
         $request->session()->flash(
             'message',
             __('Updated', ['name' => $status->name])
         );

         // Перенаправляем клиент HTTP на маршрут с именем products.index
         // (см. routes/web.php).
         return redirect(route('statuses.index'));
     }

     /**
      * Show the form for removing the specified resource.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function remove(Statuses $status)
     {
         // Использовать шаблон resources/views/products/remove.blade.php, где…
         // …переменная $producs ⁠— это объект товара.
         return view('statuses.remove')->withStatuses($status);
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function destroy(Request $request, Statuses $status)
     {
         // Удаляем товар из БД.
         $status->delete();

         // Создаём всплывающее сообщение об успешном удалении из БД
         $request->session()->flash(
             'message',
             __('Removed', ['name' => $status->name])
         );

         // Перенаправляем клиент HTTP на маршрут с именем products.index
         // (см. routes/web.php).
         return redirect(route('statuses.index'));
     }
}
