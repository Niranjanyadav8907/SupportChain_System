<?php

namespace App\Http\Controllers;

use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class TicketCategoryController extends Controller
{
    /**
     * Display categories.
     */
    public function index()
    {
        $categories = TicketCategory::all();
        return view('modules.ticket_categories.index', compact('categories'));
    }

    /**
     * Store category.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ticket_categories',
            'sla_hours' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        $category = TicketCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sla_hours' => $request->sla_hours,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ticket category created successfully.',
            'category' => $category
        ]);
    }

    /**
     * Update category.
     */
    public function update(Request $request, TicketCategory $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('ticket_categories')->ignore($category->id)],
            'sla_hours' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'sla_hours' => $request->sla_hours,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Ticket category updated successfully.',
            'category' => $category
        ]);
    }

    /**
     * Delete category.
     */
    public function destroy(TicketCategory $category)
    {
        // Restrict if tickets exist
        if ($category->tickets()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete category. There are tickets associated with this category.'
            ], 400);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Ticket category deleted successfully.'
        ]);
    }
}
