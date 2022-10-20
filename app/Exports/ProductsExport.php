<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Products;

class ProductsExport implements FromCollection
{
    public function __construct(Products $product)
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
            $product->user->name,
            $product->title,
            $product->description,
            $product->price,
            $product->categories()->implode('name',','),
        ];
    }


    public function headings(): array
    {
        return[
            'Username',
            'Title',
            'Description',
            'Price',
            'Category Name'
        ];
    }
}
