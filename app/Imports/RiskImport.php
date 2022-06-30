<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class RiskImport implements WithMultipleSheets
{
    /**
    * @param Collection $collection
    */

    public function __construct($single_document)
    {
        $this->single_document = $single_document;
    }

    public function sheets(): array
    {
        return [
            '4. EvR' => new FirstSheetImport($this->single_document)
        ];
    }

    
}
