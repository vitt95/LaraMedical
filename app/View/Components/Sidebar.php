<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Enums\SidebarRouteEnum;

/**
 * Wrapper for Sidebar component to provide additional information from Server avoiding
 * XHR communication , cause are static and immutable (until page refresh) information
 */

class Sidebar extends Component
{
    /**
     * @param array $routes
     */

    /**
     * @param string $url
     */
    protected $url;


    /**
     * @param int $index
     */
    protected $index;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($index = null)
    {
        $url = url()->current();

        $this->index = $this->get_index($url);
    }


    /**
     * Search the needle into url
     * @param array $needles
     * @param string $url
     * @return int
     */
    public function get_index(string $url)
    {
        $needles = SidebarRouteEnum::get_needles();
        $i = 0;
        $found = false;
        while(!$found && $i <= (count($needles) - 1)){
            if(str_contains(strtolower($url), strtolower($needles[$i]))){
                $found = true;
            }else {
                $i++;
            }
        }

        if($found){
            return $i;
        }else return -1;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
