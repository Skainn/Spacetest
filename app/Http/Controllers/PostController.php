<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Отображение списка всех постов
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Отображение формы для создания нового поста
    public function create()
    {
        return view('posts.create');
    }

    // Сохранение нового поста в базу данных
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:500',
        ]);
    
        $post = Post::create($request->all());
    
        if ($post) {
            return redirect()->route('posts.index')->with('success', 'Пост успешно создан.');
        } else {
            return back()->with('error', 'Ошибка при создании поста.');
        }
    }
    
    
    

    // Отображение конкретного поста
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Отображение формы для редактирования поста
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Обновление поста в базе данных
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:500',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    // Удаление поста из базы данных
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
    // Добавление комментария к посту
    public function addComment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|min:15',
        ]);

        $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(), // Предполагается, что у вас есть аутентификация пользователей
        ]);

        return back()->with('success', 'Comment added successfully');
    }

    // Обновление комментария
    public function updateComment(Request $request, Post $post, Comment $comment)
    {
        // Проверка, что пользователь может редактировать только свои комментарии
        if ($comment->user_id !== auth()->id()) {
            return back()->with('error', 'You can only edit your own comments');
        }

        $request->validate([
            'content' => 'required|min:15',
        ]);

        $comment->update($request->all());

        return back()->with('success', 'Comment updated successfully');
    }

    // Удаление комментария
    public function deleteComment(Post $post, Comment $comment)
    {
        // Проверка, что пользователь может удалять только свои комментарии
        if ($comment->user_id !== auth()->id()) {
            return back()->with('error', 'You can only delete your own comments');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully');
    }

}
