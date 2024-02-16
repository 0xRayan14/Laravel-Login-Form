<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\createPostRequest;
use App\Http\Requests\UpdatePost;
use App\Http\Requests\UpdateProfile;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('user')->orderBy('created_at', 'desc')->paginate(2);
        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function show(Post $post)
    {
        $post = $post->load('user');
        return view('blog.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return redirect()->route('blog.index')->with('ok', 'Article deleted');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('blog.edit', compact('post'));

    }

    public function update(UpdatePost $request, Post $post)
    {
        $this->authorize('update', $post);
        if($request->file('image')) {
            Storage::disk('public')->delete($post->image);
            $path = $request->file('image')->store('post', 'public');
            $updatedPost = $request->validated();
            $updatedPost['image'] = $path;
            $post->update($updatedPost);
            return redirect()->route('blog.index')->with('ok', 'Article modified');

        }

        $post->update($request->validated());
        return redirect()->route('blog.index')->with('ok', 'Article modified');

    }


    public function store(createPostRequest $request)
    {
        $path = $request->file('image')->store('post', 'public');
        $post = $request->validated();
        $post['image'] = $path;
        $post['user_id'] = Auth::user()->id;
        Post::query()->create($post);
        return redirect()->route('blog.index')->with('ok', 'Article added');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
        ]);

        $query = $request->input('query');

        $posts = Post::query()
            ->where('title', 'like', "%{$query}%")
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('blog.search', compact('posts', 'query'));
    }

    public function updateProfile(UpdateProfile $request)
    {
        $user = Auth::user();

        if ($user) {
            $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('images'), $imageName);
                $user->image = $imageName;
            }

            $user->firstname = $request->input('firstname');
            $user->lastname = $request->input('lastname');
            $user->save();

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
        }
    }


    public function editProfile()
    {
        return view('blog.profile');

    }




}
