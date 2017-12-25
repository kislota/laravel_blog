<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filter;

class FiltersController extends Controller {

    protected function redirect() {
        return redirect('/filters');
    }

    public function index() {
        //Получаем все слова
        $filters = Filter::all();
        return view('filters.index', compact('filters'));
    }

    public function create() {
        return view('filters.create');
    }

    public function store(Request $request) {
        if ($request->text) {
            //Добавляем новое слово для фильтрации
            Filter::create([
                'text' => $request->text //Слово
            ]);
        }
        return $this->redirect();
    }

    public function show(Filter $filter) {
        //Отображаем слово
        return view('filters.show', compact('filter'));
    }

    public function edit(Filter $filter) {
        //Отображаем вид для редактирования и передаём туда всё что нашли
        return view('filters.edit', compact('filter'));
    }

    public function update(Request $request, Filter $filter) {
        //Если есть что менять
        if ($request->text) {
            //Меняем старое на новое слово
            $filter->update([
                'text' => $request->text, //Слово
            ]);
        }
        return $this->redirect();
    }

    public function destroy(Filter $filter) {
        //Удаляем слово
        $filter->delete();
        return $this->redirect();
    }

}
