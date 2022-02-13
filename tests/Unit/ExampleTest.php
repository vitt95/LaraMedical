<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Enums\AvailableServices;

use App\Enums\SidebarRouteEnum;
use App\View\Components\Sidebar;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_search_index(){
        $url = "http://localhost:8000/profile";
        $needles = SidebarRouteEnum::get_needles();
        fwrite(STDERR,Sidebar::get_index($url, $needles));
        $this->assertTrue((Sidebar::get_index($url, $needles) == 1));
    }

    public function test_wrong_url_inspect(){
        $url = "http://localhost:8000/leccalecca";
        $needles = SidebarRouteEnum::get_needles();

        $this->assertTrue((Sidebar::get_index($url, $needles) == -1));
    }

}
