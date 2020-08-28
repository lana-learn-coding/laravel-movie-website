<?php

use Encore\Admin\Auth\Database\Menu;
use Illuminate\Database\Seeder;


class AdminMenuSeeder extends Seeder
{
    public function run()
    {
        $movieId = Menu::insertGetId(['title' => 'Movie', 'icon' => 'fa-bars']);
        $movieMenus = [
            ['parent_id' => $movieId, 'title' => 'Movie', 'icon' => 'fa-bars', 'uri' => 'movies/manage'],
            ['parent_id' => $movieId, 'title' => 'Category', 'icon' => 'fa-bars', 'uri' => 'movies/categories'],
            ['parent_id' => $movieId, 'title' => 'Genre', 'icon' => 'fa-bars', 'uri' => 'movies/genres'],
            ['parent_id' => $movieId, 'title' => 'Tag', 'icon' => 'fa-bars', 'uri' => 'movies/tags'],
            ['parent_id' => $movieId, 'title' => 'Language', 'icon' => 'fa-bars', 'uri' => 'movies/languages'],
            ['parent_id' => $movieId, 'title' => 'Nation', 'icon' => 'fa-bars', 'uri' => 'movies/nations'],
            ['parent_id' => $movieId, 'title' => 'Episode', 'icon' => 'fa-bars', 'uri' => 'movies/episodes'],
            ['parent_id' => $movieId, 'title' => 'Cast', 'icon' => 'fa-bars', 'uri' => 'casts'],
            ['parent_id' => $movieId, 'title' => 'Trailer', 'icon' => 'fa-bars', 'uri' => 'movies/trailers'],
            ['parent_id' => $movieId, 'title' => 'Report', 'icon' => 'fa-bars', 'uri' => 'movies/reports'],
        ];

        $userId = Menu::insertGetId(['title' => 'User', 'icon' => 'fa-user']);
        $userMenu = [
            ['parent_id' => $userId, 'title' => 'User', 'icon' => 'fa-bars', 'uri' => 'users/manage'],
            ['parent_id' => $userId, 'title' => 'Comment', 'icon' => 'fa-bars', 'uri' => 'users/comments'],
            ['parent_id' => $userId, 'title' => 'Rating', 'icon' => 'fa-bars', 'uri' => 'users/ratings']
        ];

        $webId = Menu::insertGetId(['title' => 'Web', 'icon' => 'fa-globe']);
        $webMenu = [
            ['parent_id' => $webId, 'title' => 'Banner', 'icon' => 'fa-bars', 'uri' => 'web/banners'],
        ];

        Menu::insert($movieMenus);
        Menu::insert($userMenu);
        Menu::insert($webMenu);
    }
}
