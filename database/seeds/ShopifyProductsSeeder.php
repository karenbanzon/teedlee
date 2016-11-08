<?php

use Illuminate\Database\Seeder;
use Teedlee\Providers\ShopifyServiceProvider;
use Teedlee\Models\Submission;
use Teedlee\Models\SubmissionImage;
use Teedlee\User;
use Carbon\Carbon;

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
//        \Log::info(json_encode($products));
//        dd($products);

        foreach ($products as $product)
        {
            $user = User::where('username', $product->vendor)->first();
            $submission = [
                'user_id' => $user->id,
                'title' => $product->title,
                'slug' => $product->handle,
                'description' => $product->body_html,
                'tags' => $product->tags,
                'price' => 0,
                'status' => 'publication',
//                'internal_voting_start',
//                'public_voting_start',
                'shopify_link' => 'https://shop.teedlee.ph/products/'.$product->handle,
                'created_at' => Carbon::parse($product->created_at),
            ];

//            \Log::info(json_encode($submission));
//            dd($submission);

            $model = Submission::create($submission);

            foreach ($product->images as $image)
            {
                $model->images()->create([
                    'submission_id' => $model->id,
                    'path' => $image->src,
                    'description' => ' ',
                ]);
                $model->save();
            }
        }

        \Log::info(json_encode($model->toArray()));
        dd($model->toArray());

        return $this;
    }
}
