<?php

use Encore\Admin\Auth\Database\Menu;
use Illuminate\Database\Seeder;


class AdminMenuSeeder extends Seeder
{
    public function run()
    {
        $parentId = Menu::insertGetId(['title' => 'Movie', 'icon' => 'fa-bars']);
        $menus = [
            ['parent_id' => $parentId, 'title' => 'Movie', 'icon' => 'fa-bars', 'uri' => 'movies'],
            ['parent_id' => $parentId, 'title' => 'Category', 'icon' => 'fa-bars', 'uri' => 'movies/categories'],
            ['parent_id' => $parentId, 'title' => 'Genre', 'icon' => 'fa-bars', 'uri' => 'movies/genres'],
            ['parent_id' => $parentId, 'title' => 'Tag', 'icon' => 'fa-bars', 'uri' => 'movies/tags'],
            ['parent_id' => $parentId, 'title' => 'Language', 'icon' => 'fa-bars', 'uri' => 'movies/languages'],
            ['parent_id' => $parentId, 'title' => 'Nation', 'icon' => 'fa-bars', 'uri' => 'movies/nations'],
            ['parent_id' => $parentId, 'title' => 'Episode', 'icon' => 'fa-bars', 'uri' => 'movies/episodes'],
            ['parent_id' => $parentId, 'title' => 'Cast', 'icon' => 'fa-bars', 'uri' => 'casts'],
            ['parent_id' => $parentId, 'title' => 'Trailer', 'icon' => 'fa-bars', 'uri' => 'movies/trailers'],
            ['parent_id' => $parentId, 'title' => 'Report', 'icon' => 'fa-bars', 'uri' => 'movies/reports'],
        ];
        Menu::insert($menus);
        Menu::insert(['title' => 'User', 'icon' => 'fa-user', 'uri' => 'users']);
    }
}
