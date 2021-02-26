<?php

namespace App\View\Components\Tabels;

use Illuminate\View\Component;

class Pagination extends Component
{

    public $table;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.pagination');
    }
}
