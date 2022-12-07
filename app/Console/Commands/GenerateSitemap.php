<?php 
namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
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

        $sitemap = Sitemap::create();

        // $sitemap->add(Url::create('/')->setPriority(1.0));
        // $sitemap->add(Url::create('/faq')->setPriority(0.8));
        // $sitemap->add(Url::create('/privacy')->setPriority(0.8));
        // $sitemap->add(Url::create('/rules')->setPriority(0.8));

        // Product::active()->get()->each(function (Product $product) use ($sitemap) {
        //     $sitemap->add(Url::create("/products/{$product->slug}")
        //     ->setPriority(0.9)
        //     );
        // });
        // Category::where('parent_id' , 0)->where('is_active', 1)->get()->each(function (Category $category) use ($sitemap) {
        //     $sitemap->add(Url::create("/search/{$category->slug}")
        //     ->setPriority(0.7)
        //     );
        // });
        // Tag::all()->each(function (Tag $tag) use ($sitemap) {
        //     $sitemap->add(Url::create("/search/?tag={$tag->name}")
        //     ->setPriority(0.8)
        //     );
        // });
        // Category::where('parent_id' , '!=' , 0)->where('is_active', 1)->get()->each(function (Category $category) use ($sitemap) {
        //     $sitemap->add(Url::create("/main/{$category->slug}")
        //     ->setPriority(0.7)
        //     );
        // });
        // Post::where('status' , 1)->select('category')->distinct()->get()->each(function (Post $post) use ($sitemap) {
        //     $sitemap->add(Url::create("/post/list/{$post->category}")
        //     ->setPriority(0.7)
        //     );
        // });

        // Post::where('status' , 1)->get()->each(function (Post $post) use ($sitemap) {
        //     $sitemap->add(Url::create("/post/{$post->slug}")
        //     ->setPriority(0.7)
        //     );
        // });
        
        $sitemap->writeToFile(public_path('sitemap.xml'));
      
    }
}