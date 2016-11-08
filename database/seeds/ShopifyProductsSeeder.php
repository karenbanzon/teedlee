<?php

use Illuminate\Database\Seeder;
use Teedlee\Providers\ShopifyServiceProvider;
use Teedlee\Models\Submission;
use Teedlee\User;

class ShopifyProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->products();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function products()
    {
        $products = (new ShopifyServiceProvider(new \Oseintow\Shopify\Facades\Shopify()))->products();
        dd($products);
        $data = [];

        foreach ($products as $product)
        {
            $user = User::where('username', $product->vendor);
            $data[] = [
                'user_id' => $user->id,
                'title' => $product->name,
                'slug' => null,
                'description' => $product->name,
                'tags',
                'price',
                'status' => 'publication',
                'internal_voting_start',
                'public_voting_start',
                'shopify_link',
                'created_at'
            ];
        }

        dd($data);

        $model = Submission::insert($data);

        return $this;
    }
}
