<?php

namespace App\View\Components;

use Illuminate\View\Component;

class News extends Component
{
    /**
     * The alert type.
     *
     */
    public $news;

    /**
     * Create a new component instance.
     * @return void
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.news');
    }
}
