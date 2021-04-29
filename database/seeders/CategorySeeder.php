<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['slug'=>'middle-east','name'=>__('admin.middleEast'),'parent_id'=>null],
            ['slug'=>'science-technology','name'=>__('admin.tech'),'parent_id'=>null],
            ['slug'=>'health','name'=>__('admin.health'),'parent_id'=>null],
            ['slug'=>'investigations-articles','name'=>__('admin.investigationArticles'),'parent_id'=>null],
            ['slug'=>'infoGraphic','name'=>__('admin.infoGraphic'),'parent_id'=>null],
            ['slug'=>'article','name'=>__('admin.article'),'parent_id'=>4],
            ['slug'=>'investigation','name'=>__('admin.investigation'),'parent_id'=>4],
        ];
        DB::table('categories')->insert($categories);
    }
}
