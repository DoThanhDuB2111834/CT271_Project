<?php

namespace App\View\Composers;

use App\Models\category;
use Illuminate\View\View;

class CategoriesComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
        protected category $category,
    ) {
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('highestCategories', $this->category->getHighestParent());
    }
}