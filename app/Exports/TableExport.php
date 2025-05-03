<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;


class TableExport implements FromView, WithTitle
{
    protected $viewName;
    protected $data;
    protected $sheetTitle;

    public function __construct($viewName, $data = [], $sheetTitle = 'hhhhhhhhh')
    {
        $this->viewName = $viewName;
        $this->data = $data;
        $this->sheetTitle = $sheetTitle;
    }

    public function view(): View
    {
        return view($this->viewName, $this->data);
    }
    public function title(): string
    {
        return $this->sheetTitle;

    }

}
