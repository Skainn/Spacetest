<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    // Создание нового комментария
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|min:15',
        ]);

        $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(), // Или используйте $request->user()->id, если у вас нет аутентификации
        ]);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Comment added successfully.');
    }

    // Отображение формы редактирования комментария
    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit', compact('post', 'comment'));
    }

    // Обновление комментария
    public function update(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'content' => 'required|min:15',
        ]);

        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Comment updated successfully.');
    }

    // Удаление комментария
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show', $post)
            ->with('success', 'Comment deleted successfully.');
    }
}
