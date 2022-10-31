<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements WithHeadings, FromCollection, WithMapping
{
    public function __construct($product)
    {
        $this->product = $product;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->product;
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->users->name,
            $product->title,
            $product->categories()->implode('name', ','),
            $product->description,
            $product->price,
        ];
    }


    public function headings(): array
    {
        return [
            'ID',
            'User',
            'Title',
            'Category_Name',
            'Description',
            'Price',
            'del',

        ];
    }
}
