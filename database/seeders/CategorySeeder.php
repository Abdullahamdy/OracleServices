<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->delete();
 Category::create(['name'=>'القسم الاول']);
 Category::create(['name'=>'القسم الثاني']);
     Category::create(['name'=>'القسم الثالت']);
          Category::create(['name'=>'القسم الرابع']); 
           Category::create(['name'=>'القسم الخامس']);


          Category::create(['name'=>' تابع القسم الاول','parent_id'=>1]);
          Category::create(['name'=>'تابع القسم لاول منتج2','parent_id'=>1]);
          Category::create(['name'=>'تابع القسم لاول منتج3 ','parent_id'=>1]);
          Category::create(['name'=>'تابع القسم لاول منتج4','parent_id'=>1]);
          Category::create(['name'=>'تابع القسم لاول منتج5 ','parent_id'=>1]);


          Category::create(['name'=>' تابع القسم الثاني','parent_id'=>2]);
          Category::create(['name'=>'تابع القسم الثاني منتج2','parent_id'=>2]);
          Category::create(['name'=>'تابع القسم الثاني منتج3 ','parent_id'=>2]);
          Category::create(['name'=>'تابع القسم الثاني منتج4','parent_id'=>2]);
          Category::create(['name'=>'تابع القسم الثاني منتج5 ','parent_id'=>2]);

          Category::create(['name'=>' تابع القسم الثالث','parent_id'=>3]);
          Category::create(['name'=>'تابع القسم الثالث منتج2','parent_id'=>3]);
          Category::create(['name'=>'تابع القسم الثالث منتج3 ','parent_id'=>3]);
          Category::create(['name'=>'تابع القسم الثالث منتج4','parent_id'=>3]);
          Category::create(['name'=>'تابع القسم الثالث منتج5 ','parent_id'=>3]);

          Category::create(['name'=>' تابع القسم الرابع','parent_id'=>4]);
          Category::create(['name'=>'تابع القسم الرابع منتج2','parent_id'=>4]);
          Category::create(['name'=>'تابع القسم الرابع منتج3 ','parent_id'=>4]);
          Category::create(['name'=>'تابع القسم الرابع منتج4','parent_id'=>4]);
          Category::create(['name'=>'تابع القسم الرابع منتج5 ','parent_id'=>4]);

          Category::create(['name'=>' تابع القسم الخامس','parent_id'=>5]);
          Category::create(['name'=>'تابع القسم الخامس منتج2','parent_id'=>5]);
          Category::create(['name'=>'تابع القسم الخامس منتج3 ','parent_id'=>5]);
          Category::create(['name'=>'تابع القسم الخامس منتج4','parent_id'=>5]);
          Category::create(['name'=>'تابع القسم الخامس منتج5 ','parent_id'=>5]);
    }
}
