<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Main extends Component
{
    use WithPagination, LivewireAlert;

    public $show_create = false, $show_edit = false;
    public $search = '', $perPage = 5, $page = 1;


    public function sendAlert($status, $message)
    {
        $this->alert($status, $message, [
            'position'  =>  'center',
            'timer'  =>  2000,
            'toast'  =>  false,
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }

    // pagination things
    public function previousPage()
    {
        $this->page = $this->page - 1;
    }

    public function nextPage()
    {
        $this->page = $this->page + 1;
    }

    public function gotoPage($page)
    {
        $this->page = $page;
    }
}
