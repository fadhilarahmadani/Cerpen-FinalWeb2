<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $max_data = 8;
        $stories = Story::orderBy('id', 'asc')->paginate($max_data);

        return view('admin.story', ['stories' => $stories]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Mencari cerita berdasarkan judul atau kategori
        $stories = Story::where('title', 'LIKE', "%$query%")
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->paginate(8) // Gunakan paginate di sini
            ->withQueryString();


        return view('welcome', compact('stories'));
    }
    public function searchAdmin(Request $request)
    {
        $query = $request->input('query');

        // Mencari cerita berdasarkan judul atau kategori
        $stories = Story::where('title', 'LIKE', "%$query%")
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->paginate(8) // Gunakan paginate di sini
            ->withQueryString();


        return view('admin.story', compact('stories'));
    }

    public function user()
    {
        $max_data = 8;
        $stories = Story::orderBy('id', 'asc')->paginate($max_data);

        return view('welcome', ['stories' => $stories]);
    }

    public function showCategoryStories($categoryId)
    {
        $max_data = 8;

        $stories = Story::where('category_id', $categoryId)
            ->paginate($max_data)
            ->withQueryString();

        return view('welcome', ['stories' => $stories]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // dd($request),
            'image' => 'required|image|mimes:jpg,jpeg,png|max:4096',
            'title' => 'required|string|max:255|unique:stories,title',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'content' => 'required|string',

        ]);

        $imagePath = $request->file('image')->store('images/stories', 'public');
        $imageFileName = basename($imagePath);

        Story::create([
            'image' => $imageFileName,
            'title' => $validatedData['title'],
            'category_id' => $validatedData['category_id'],
            'description' => $validatedData['description'],
            'content' => $validatedData['content'],
        ]);

        return redirect()->route('admin.story')->with('success', 'Story created successfully.');
    }

    public function show($id)
    {
        $story = Story::with('category')->findOrFail($id);
        return view('admin.show', compact('story'));
    }
    // public function read($id)
    // {
    //     $story = Story::with('category')->findOrFail($id);
    //     return view('user.read', compact('story'));
    // }
    public function read($id)
    {
        $story = Story::findOrFail($id);

        if ($story->is_premium && !auth()->user()->is_premium) {
            return redirect()->route('subscription.form')->with('error', 'You need a premium subscription to read this story.');
        }

        return view('user.read', compact('story'));
    }



    public function edit($id)
    {
        $categories = Category::all();
        $story = Story::findOrFail($id);

        return view('admin.edit', compact('categories', 'story'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'title' => 'required|string|max:255|unique:stories,title,' . $id,
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'content' => 'required|string',
        ]);

        $story = Story::findOrFail($id);
        $story->title = $validatedData['title'];
        $story->category_id = $validatedData['category_id'];
        $story->description = $validatedData['description'];
        $story->content = $validatedData['content'];

        // Update is_premium based on checkbox
        $story->is_premium = $request->has('is_premium') ? 1 : 0;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            Storage::disk('public')->delete('images/stories/' . $story->image);

            // Store new image
            $imagePath = $request->file('image')->store('images/stories', 'public');
            $story->image = basename($imagePath);
        }

        $story->save();

        return redirect()->route('admin.story')->with('success', 'Story updated successfully.');
    }

    public function destroy($id)
    {
        $story = Story::findOrFail($id);
        if ($story->image) {
            Storage::disk('public')->delete('images/stories/' . $story->image);

       }
        $story->delete();

        return redirect()->route('admin.story')->with('success', 'Story deleted successfully.');
    }
}