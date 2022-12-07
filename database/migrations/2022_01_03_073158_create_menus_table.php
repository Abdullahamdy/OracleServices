<?php

use App\Models\Menu;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('permission');
            $table->string('icon');
            $table->string('name');
            $table->longText('url');
            $table->timestamps();
        });


        $sidebar = [
            [
                'url' => "//shieldit.sa",
                'name' => "Home",
                'icon' => "fa fa-home",
                'permission' => "",
            ],
            [
                'url' => "//accounts.shieldit.sa",
                'name' => "Profile",
                'icon' => "fa fa-user",
                'permission' => '',
            ],
            [
                'url' => "//posts.shieldit.sa",
                'name' => "Posts",
                'icon' => "fas fa-user-graduate",
                'permission' => 'posts show posts',
            ],
            [
                'url' => "//homework.shieldit.sa",
                'name' => "Homework",
                'icon' => "fas fa-book",
                'permission' => 'homework show homework',
            ],
            [
                'url' => "//forms.shieldit.sa",
                'name' => "Forms",
                'icon' => "fas fa-question-circle",
                'permission' => 'forms show forms',
            ],
            [
                'url' => "//courses.shieldit.sa",
                'name' => "Courses",
                'icon' => "fas fa-chalkboard-teacher",
                'permission' => 'courses show courses',
            ],
            [
                'url' => "//communication.shieldit.sa",
                'name' => "Communications",
                'icon' => "fas fa-users",
                'permission' => 'communication show communications',
            ],
            [
                'url' => "//support.shieldit.sa",
                'name' => "Support",
                'icon' => "fas fa-headset",
                'permission' => '',
            ],
            [
                'url' => "//tasks.shieldit.sa",
                'name' => "Tasks",
                'icon' => "fas fa-list-ul",
                'permission' => 'tasks show tasks',
            ],
            [
                'url' => "//meet.shieldit.sa",
                'name' => "Meetings",
                'icon' => "fas fa-video",
                'permission' => 'meet show meet',
            ],
            [
                'url' => "//accounts.shieldit.sa/users",
                'name' => "Users",
                'icon' => "fas fa-users",
                'permission' => 'show users',
            ],
            [
                'url' => "//accounts.shieldit.sa/roles",
                'name' => "Roles",
                'icon' => "fas fa-shield-alt",
                'permission' => 'show roles',
            ],
            [
                'url' => "//accounts.shieldit.sa/notifications",
                'name' => "Notifications",
                'icon' => "fas fa-bell",
                'permission' => 'show notifications',
            ],
            [
                'url' => "/telescope",
                'name' => "Telescope",
                'icon' => "fas fa-eye",
                'permission' => 'telescope',
            ],
            [
                'url' => "/translations",
                'name' => "Translations",
                'icon' => "fas fa-globe",
                'permission' => 'translations',
            ]
        ];
        $menu = [
            [
                'url' => "//shieldit.sa",
                'name' => "Home",
                'icon' => "fa fa-home",
                'permission' => "",
            ],
            [
                'url' => "//communication.shieldit.sa",
                'name' => "Communications",
                'icon' => "fas fa-users",
                'permission' => 'communication show communications',
            ],
            [
                'url' => "//forms.shieldit.sa",
                'name' => "Forms",
                'icon' => "fas fa-question-circle",
                'permission' => 'forms show forms',
            ],
            [
                'url' => "//courses.shieldit.sa",
                'name' => "Courses",
                'icon' => "fas fa-chalkboard-teacher",
                'permission' => 'courses show courses',
            ],
            [
                'url' => "//accounts.shieldit.sa",
                'name' => "Profile",
                'icon' => "fa fa-user",
                'permission' => '',
            ]
        ];

        if (!empty($menu)) {
            foreach ($menu as $menu) {
                $menu['type'] = "menu";
                $menu = Menu::updateOrCreate(['name' => $menu['name'] , 'type' => $menu['type']],$menu);
            }
        }

        if (!empty($sidebar)) {
            foreach ($sidebar as $menu) {
                $menu['type'] = "sidebar";
                $menu = Menu::updateOrCreate(['name' => $menu['name'] , 'type' => $menu['type']],$menu);
            }
        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
