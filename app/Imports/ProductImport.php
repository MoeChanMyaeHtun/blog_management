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

   public function collection(Collection $rows )
    {



       foreach ($rows as $row)
       {

        $profile= User::where('name',$row['user'])->get();
        $product= Products::Where('id',$row['id'])->first();
        $procount= Products::Where('id',$row['id'])->count();

        $p=Products::updateOrCreate(
            [
                'id' => $row['id']
            ],
            [
            'id' => $row['id'],
            'user_id' => $profile->pluck('id')['0'],
            'title' => $row['title'],
            'description' => $row['description'],
            'price' => $row['price'],
            // 'deleted_at' => $row['del'],
            ],

        );

        if($row['del']==1){
            $product->categories()->detach();
            $product->delete();
        }
        if($procount== null){


            $categories = explode(',',$row['category_name']);
            foreach($categories as $value){
                $category = Category::where('name',$value)->get();
                $cat_id = $category->pluck('id');
                $p->categories()->attach($cat_id);

            }
        }else{
            $categories = explode(',',$row['category_name']);
            $product->categories()->detach();
            foreach($categories as $value){
                $category = Category::where('name',$value)->get();
                $cat_id = $category->pluck('id');
                $product->categories()->attach($cat_id);

            }
        }

        }
    }
}









