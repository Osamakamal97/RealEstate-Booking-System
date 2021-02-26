<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Table extends Component
{

    public String $title;
    public $table;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $title, $table)
    {
        $this->title = $title;
        $this->table = $table;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.table');
    }
}
