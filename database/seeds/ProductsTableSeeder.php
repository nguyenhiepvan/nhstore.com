<?php

use Illuminate\Database\Seeder;
use nhstore\Models\Product;
use nhstore\Models\Photo;
use nhstore\Models\Size;
use nhstore\Models\Color;
use nhstore\Models\Price;
use nhstore\Models\Tag;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $fake = \Faker\Factory::create();
        // die(''.$fake->imageUrl($width=470, $height=610,'fashion'));
    	$fake = \Faker\Factory::create();
    	for ($i=0; $i < 20; $i++) {
    		//fake product
    		$product = Product::create([
    			'name'=>$fake->unique()->sentence(3),
    			'acronym'=>$fake->unique()->sentence(3),
    			'slug'=>$fake->unique()->slug,
    			'description'=>$fake->text($maxNbChars = 1000)   ,
          'overview'=>$fake->text($maxNbChars = 255)   ,
    			'material_id'=>$fake->numberBetween($min = 1, $max = 20),
    			'category_id'=>$fake->numberBetween($min = 1, $max = 20),
    			'brand_id'=>$fake->numberBetween($min = 1, $max = 20),
    			'country_id'=>$fake->numberBetween($min = 1, $max = 20),
    			'supplier_id'=>$fake->numberBetween($min = 1, $max = 20),
    			'user_id'=>$fake->numberBetween($min = 1, $max = 20),
    		]);
    		//fake image
        Photo::create([
          'product_id'=>$product->id,
          '242x314'=>$fake->imageUrl($width=242, $height=314,'fashion'),
          '255x311'=>$fake->imageUrl($width=255, $height=311,'fashion'),
          '263x341'=>$fake->imageUrl($width=263, $height=341,'fashion'),
          '75x75'=>$fake->imageUrl($width=75, $height=75,'fashion'),
          '394x511'=>$fake->imageUrl($width=394, $height=511,'fashion'),
          '470x610'=>$fake->imageUrl($width=470, $height=610,'fashion'),
          'user_id'=>$product->user_id,
          'is_thumbnail'=>true,
        ]);
        for ($j=0; $j < 3; $j++) {
         Photo::create([
          'product_id'=>$product->id,
          '470x610'=>$fake->imageUrl($width =470, $height=610, 'fashion'),
          'user_id'=>$product->user_id,
        ]);
       }
    		//fake price
       Price::create([
         'product_id' => $product->id,
         'in_price' => $fake->numberBetween($min = 10000, $max = 1000000),
         'out_price' => $fake->numberBetween($min = 10000, $max = 1000000),
         'general_price' => $fake->numberBetween($min = 10000, $max = 1000000),
       ]);
           //fake color
       \DB::table('product_colors')->insert([
        'product_id' => $product->id,
        'color_id'=>$fake->numberBetween($min = 1, $max = 4)
      ]);
       \DB::table('product_colors')->insert([
        'product_id' => $product->id,
        'color_id'=>$fake->numberBetween($min = 1, $max = 4)
      ]);
            //fake size
       \DB::table('product_sizes')->insert([
        'product_id' => $product->id,
        'size_id'=>$fake->numberBetween($min = 1, $max = 4)
      ]);
       \DB::table('product_sizes')->insert([
        'product_id' => $product->id,
        'size_id'=>$fake->numberBetween($min = 1, $max = 4)
      ]);
       for ($k=0; $k < 4; $k++) {
        \DB::table('product_tags')->insert([
          'product_id' => $product->id,
          'tag_id'=>$fake->numberBetween($min = 1, $max = 20)
        ]);
      }
    }
  }
}
