<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Comment::create([
            'comment_text'=>'Este s un comentario',
            'user_id'=>'1',
            'ticket_id'=>'1'
            ]);
    }
}
