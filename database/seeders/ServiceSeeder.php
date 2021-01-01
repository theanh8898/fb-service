<?php
namespace Database\Seeders;

use App\Models\Service;
use DisableForeignKeys;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;

class ServiceSeeder extends Seeder
{

    use TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate('services');
        Service::create([
            'code_type' => 'follow',
            'name' => 'Tăng theo dõi cá nhân',
            'price' => 400000,
            'number_of_price' => 200,
            'created_at' => '2020-01-01',
        ]);

        Service::create([
            'code_type' => 'like_page',
            'name' => 'Tăng like Fanpage',
            'price' => 400000,
            'number_of_price' => 200,
            'created_at' => '2020-01-01'
        ]);
        Service::create([
            'code_type' => 'like_post',
            'name' => 'Tăng like bài viết',
            'price' => 400000,
            'number_of_price' => 200,
            'created_at' => '2020-01-01'
        ]);
        Service::create([
            'code_type' => 'comment_post',
            'name' => 'Tăng comment bài viết',
            'price' => 400000,
            'number_of_price' => 200,
            'created_at' => '2020-01-01'
        ]);
        Service::create([
            'code_type' => 'comment_livestream',
            'name' => 'Tăng comment Livestream',
            'price' => 400000,
            'number_of_price' => 200,
            'created_at' => '2020-01-01'
        ]);
        Service::create([
            'code_type' => 'share_live_group',
            'name' => 'Share live vào nhiều nhóm',
            'price' => 400000,
            'number_of_price' => 200,
            'created_at' => '2020-01-01'
        ]);
        Service::create([
            'code_type' => 'share_live_wall',
            'name' => 'Share live vào nhiều trang cá nhân',
            'price' => 400000,
            'number_of_price' => 200,
            'created_at' => '2020-01-01'
        ]);
    }
}
