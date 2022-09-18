<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['name' => 'Amr', 'email' =>'amr@gmail.com']);
        User::factory()->create(['name' => 'Andrea', 'email' =>'andrea@gmail.com']);
        User::factory()->create(['name' => 'Alex', 'email' =>'alex@gmail.com']);
        User::factory()->create(['name' => 'Andres', 'email' =>'andres@gmail.com']);
        User::factory()->create(['name' => 'Jose Miguel', 'email' =>'josemiguel@gmail.com']);
        User::factory()->create(['name' => 'Jael', 'email' =>'jael@gmail.com']);

        Image::factory()->create(['name'=>'Shish Kebob', 'url'=>'https://images.unsplash.com/photo-1555939594-58d7cb561ad1', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Humus', 'url'=>'https://images.unsplash.com/photo-1622040805736-e2b922967ee0', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Pray', 'url'=>'https://images.unsplash.com/photo-1574246604907-db69e30ddb97', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Lanterns', 'url'=>'https://images.unsplash.com/photo-1561314945-0562f5b6d2c6', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Tea', 'url'=>'https://images.unsplash.com/photo-1619964346678-252094a900aa', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Forest', 'url'=>'https://images.unsplash.com/photo-1508921912186-1d1a45ebb3c1', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Road', 'url'=>'https://images.unsplash.com/photo-1531804055935-76f44d7c3621', 'user_id'=>1]);
        Image::factory()->create(['name'=>'White Rose', 'url'=>'https://images.unsplash.com/photo-1495231916356-a86217efff12', 'user_id'=>1]);
        Image::factory()->create(['name'=>'New York', 'url'=>'https://images.unsplash.com/photo-1523032217284-d9e49d6c5f04', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Pines', 'url'=>'https://images.unsplash.com/photo-1534142499731-a32a99935397', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Photographer', 'url'=>'https://images.unsplash.com/photo-1607189968599-9739cb26a88b', 'user_id'=>1]);
        Image::factory()->create(['name'=>'Girl', 'url'=>'https://images.unsplash.com/photo-1606893995103-a431bce9c219', 'user_id'=>1]);

        Image::factory()->create(['name'=>'Camera', 'url'=>'https://images.unsplash.com/photo-1609607847926-da4702f01fef', 'user_id'=>2]);
        Image::factory()->create(['name'=>'Lens', 'url'=>'https://images.unsplash.com/photo-1609813744174-a0df83d477fe', 'user_id'=>2]);
        Image::factory()->create(['name'=>'Shot', 'url'=>'https://images.unsplash.com/photo-1550142823-32fc00a5f83f', 'user_id'=>2]);
        Image::factory()->create(['name'=>'Mobile Photo', 'url'=>'https://images.unsplash.com/photo-1601134991665-a020399422e3', 'user_id'=>2]);
        Image::factory()->create(['name'=>'Rainbow', 'url'=>'https://images.unsplash.com/photo-1548475390-f6908921aaf8', 'user_id'=>2]);
        Image::factory()->create(['name'=>'Candle', 'url'=>'https://images.unsplash.com/photo-1596093019686-550d740a2870', 'user_id'=>2]);

        Image::factory()->create(['name'=>'Rubber Duck', 'url'=>'https://images.unsplash.com/photo-1601829534265-66684bd4dcc6', 'user_id'=>3]);
        Image::factory()->create(['name'=>'Cathedral', 'url'=>'https://images.unsplash.com/photo-1558642084-fd07fae5282e', 'user_id'=>3]);
        Image::factory()->create(['name'=>'Barcelona Beach', 'url'=>'https://images.unsplash.com/photo-1529551739587-e242c564f727', 'user_id'=>3]);
        


    }
}
