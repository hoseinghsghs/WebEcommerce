<?php 
namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sitemap = SitemapGenerator::create(config('app.url'))->getSitemap() ;
        Product::all()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(Url::create("/products/{$product->slug}")
            ->setPriority(0.9)
            );
        });
        Category::where('parent_id' , 0)->get()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(Url::create("/search/{$category->slug}")
            ->setPriority(0.9)
            );
        });
        Category::where('parent_id' , '!=' , 0)->get()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(Url::create("/main/{$category->slug}")
            ->setPriority(0.9)
            );
        });
        Post::all()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(Url::create("/posts/{$post->id}")
            ->setPriority(0.8)
            );
        });
        $sitemap->writeToFile(public_path('sitemap.xml'));
      
    }
}