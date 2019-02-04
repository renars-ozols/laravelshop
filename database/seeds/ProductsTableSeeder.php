<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = Storage::disk('s3')->files('starter_files');

        foreach ($files as $file) {
            $image = str_replace('starter_files/', '', $file);
            Storage::disk('s3')->copy($file, 'images/'.$image);
        }

        App\Product::create([
        	'category_id' => '1',
        	'name' => 'Mens Black T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'mens-black-tshirt.png',
        	'price' => 20.50
        ]);
        App\Product::create([
        	'category_id' => '1',
        	'name' => 'Mens Custom T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'mens-custom-tshirt.png',
        	'price' => 25.30
        ]);
        App\Product::create([
        	'category_id' => '1',
        	'name' => 'Mens Red T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'mens-red-tshirt.png',
        	'price' => 19.00
        ]);
        App\Product::create([
        	'category_id' => '1',
        	'name' => 'Mens White T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'mens-white-tshirt.png',
        	'price' => 18.50
        ]);
        App\Product::create([
        	'category_id' => '11',
        	'name' => 'Womens Blue T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'womens-blue-tshirt.png',
        	'price' => 20.10
        ]);
        App\Product::create([
        	'category_id' => '11',
        	'name' => 'Womens Green T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'womens-green-tshirt.png',
        	'price' => 19.00
        ]);
        App\Product::create([
        	'category_id' => '11',
        	'name' => 'Womens Red T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'womens-red-tshirt.png',
        	'price' => 22.15
        ]);
        App\Product::create([
        	'category_id' => '21',
        	'name' => 'Kids Blue T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'kids-blue-tshirt.png',
        	'price' => 15.10
        ]);
        App\Product::create([
        	'category_id' => '21',
        	'name' => 'Kids Red T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'kids-red-tshirt.png',
        	'price' => 17.50
        ]);
        App\Product::create([
        	'category_id' => '21',
        	'name' => 'Kids White T-shirt',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer luctus enim non diam commodo, ut tincidunt lacus vulputate. Etiam sodales suscipit nunc non aliquet. Nulla consectetur sollicitudin suscipit. Donec dapibus, diam sit amet luctus convallis, odio turpis consectetur ligula, non commodo leo tortor rutrum odio. Proin quis mauris laoreet sem varius condimentum. Donec dignissim leo justo. Donec porta, est sit amet blandit dictum, ex enim aliquam tortor, sed hendrerit arcu elit ac orci. Cras non congue purus, sit amet laoreet magna. Duis ultrices sem in arcu euismod volutpat.',
            'image' => 'kids-white-tshirt.png',
        	'price' => 17.00
        ]);
    }
}
