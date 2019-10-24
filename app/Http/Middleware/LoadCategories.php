<?php

namespace nhstore\Http\Middleware;

use Closure;
use nhstore\Models\Category;
class LoadCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \view()->share('categories', $this->get_categories());
        return $next($request);
    }
    /******************************************************************************/
    // Hàm này dùng để in danh mục
    /******************************************************************************/
    public function get_categories($parent = null)
    {
        $html = '';
        $categories = Category::where([
            ['status',true],
            ['parent_id',$parent],
            ['deleted_at',null]
        ])->get();
        if ($categories->count()!=0) {
            $html = ' <ul class="submenu text-left">';
            foreach ($categories as $category) {
                $current_id = $category->id;
                $html .= '<li><a href="/products/category='.$category->slug.'">'.$category->name.'</a>
                ';
                if(empty($category->child))
                {
                    $html .= $this->get_categories($current_id);
                }
                $html .= '</li>';
            }
            $html .= '</ul>';
        }
        return $html;
    }
}
