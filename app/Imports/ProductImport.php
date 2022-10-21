<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Support\Collection;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductImport implements ToCollection,WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {


            $profile= User::where('name',$row['user'])->get();

            $product = new Products();
            $product->user_id = $profile->pluck('id')['0'];
            $product->title = $row['title'];
            $product->price = $row['price'];
            $product->description = $row['description'];
            $product->save();

           $categories = explode(',',$row['category_name']);

           foreach($categories as $value){
                $category = Category::where('name',$value)->get();
                $cat_id = $category->pluck('id');
                $product->categories()->attach($cat_id);
            }

            }

   }
}
