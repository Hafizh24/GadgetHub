<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

#[Title('Products - GadgetHub')]

class ProductsPage extends Component
{
    #[Url()]
    public $selected_categories = [];

    #[Url]
    public $selected_brands = [];

    #[Url]
    public $featured;

    #[Url]
    public $sort = 'latest';

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);
        $categories = Category::query()->where('is_active', 1)->get(['id', 'name', 'slug']);
        $brands = Brand::query()->where('is_active', 1)->get(['id', 'name', 'slug']);

        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }

        if (!empty($this->selected_brands)) {
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }

        return view('livewire.products-page', [
            'products' => $productQuery->paginate(6),
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
