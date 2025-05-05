<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class TableExport implements FromView, WithTitle, ShouldAutoSize ,WithEvents
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
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Enable Right to Left (RTL)
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
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
