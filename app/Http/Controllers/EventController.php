<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('category')){
            $events = Event::with('category')->where('user_id', auth()->id())->where('category_id', $request->category)->get();
        }else{
            $events = Event::with('category')->where('user_id', auth()->id())->get();
        }
        $categories = Category::all();
        return view('pages.event.index', compact('events', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.event.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
        ]);

        // Create a new Post instance and fill it with the validated data
        Event::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'user_id' => auth()->id(),
        ]);

        // Redirect or return a response
        return redirect()->route('event.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $event = Event::find($id);
        $categories = Category::all();
        return view('pages.event.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
        ]);

        // Create a new Post instance and fill it with the validated data
        $event = Event::find($id);
        $event->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
        ]);

        // Redirect or return a response
        return redirect()->route('event.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Event::find($id)->delete();

        return redirect()->route('event.index')->with('success', 'Event deleted successfully');
    }
}
