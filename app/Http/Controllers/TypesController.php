<?php

namespace App\Http\Controllers;

use App\Types;
use Illuminate\Http\Request;

class TypesController extends Controller
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
         $types = Types::orderBy('name', 'ASC')->get();
         // Использовать шаблон resources/views/products/index.blade.php, где…
         return view('types.index')->withTypes($types);
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
         $type = new Types();

         // Использовать шаблон resources/views/products/create.blade.php, в котором…
         return view('types.create')->withTypes($type);
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
         $type = Types::create($attributes);

         // Создаём всплывающее сообщение об успешном сохранении в БД:
         // первый аргумент ⁠— произвольный ID сообщения, второй ⁠— перевод
         // (см. resources/lang/ru/messages.php).
         $request->session()->flash(
             'message',
             __('Created', ['name' => $type->name])
         );

         // Перенаправляем клиент HTTP на маршрут с именем products.index
         // (см. routes/web.php).
         return redirect(route('types.index'));
     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function show(Types $type)
     {
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function edit(Types $type)
     {
         // Форма редактирования продукта в БД.
         // Использовать шаблон resources/views/products/edit.blade.php, в котором…
         return view('types.edit')->withType($type);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Types $type)
     {
         // Редактирование продукта в БД.

         // Принимаем из формы значения полей с name, равными title, price.
         $attributes = $request->only(['name']);

         // Обновляем кортеж в БД.
         $type->update($attributes);

         // Создаём всплывающее сообщение об успешном обновлении БД
         $request->session()->flash(
             'message',
             __('Updated', ['name' => $type->name])
         );

         // Перенаправляем клиент HTTP на маршрут с именем products.index
         // (см. routes/web.php).
         return redirect(route('types.index'));
     }

     /**
      * Show the form for removing the specified resource.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function remove(Types $type)
     {
         // Использовать шаблон resources/views/products/remove.blade.php, где…
         // …переменная $producs ⁠— это объект товара.
         return view('types.remove')->withTypes($type);
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Product  $product
      * @return \Illuminate\Http\Response
      */
     public function destroy(Request $request, Types $type)
     {
         // Удаляем товар из БД.
         $type->delete();

         // Создаём всплывающее сообщение об успешном удалении из БД
         $request->session()->flash(
             'message',
             __('Removed', ['name' => $type->name])
         );

         // Перенаправляем клиент HTTP на маршрут с именем products.index
         // (см. routes/web.php).
         return redirect(route('types.index'));
     }
}
