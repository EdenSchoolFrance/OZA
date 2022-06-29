<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;

class RiskImport implements ToCollection, WithMultipleSheets
{
    /**
    * @param Collection $collection
    */

    public function sheets(): array
    {
        return [
            '4. EvR' => new FirstSheetImport()
        ];
    }
}
