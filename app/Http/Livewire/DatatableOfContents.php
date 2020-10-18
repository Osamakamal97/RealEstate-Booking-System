<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DatatableOfContents extends LivewireDatatable
{
    public function render()
    {
        return view('livewire.datatable-of-contents');
    }

    public $model = Admin::class;

    public function columns()
    {
        return [
            Column::callback('title', function ($value) {
                return view('datatables::link', [
                    'href' => "/" . Str::slug($value),
                    'slot' => ucfirst($value)
                ]);
            })
                ->label('Page')
                ->sortBy('id')
                ->defaultSort('asc'),

            Column::name('description')
        ];
    }
}
