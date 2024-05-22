<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputersController extends Controller
{
    // private static function getData()
    // {
    //     return [
    //         ['id' => 1, 'name' => 'LG', 'origin' => 'korya'],
    //         ['id' => 2, 'name' => 'Samsung', 'origin' => 'USA'],
    //         ['id' => 3, 'name' => 'Dell', 'origin' => 'UK'],
    //     ];
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("computers.index", [
            'computers' => Computer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer-name' => 'required',
            'computer-origin' => 'required',
            'computer-price' => ['required', 'integer'],
        ]);

        $computer = new Computer();
        $computer->name = strip_tags($request->input('computer-name'));
        $computer->origin = strip_tags($request->input('computer-origin'));
        $computer->price = strip_tags($request->input('computer-price'));

        $computer->save();

        return redirect()->route('computers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $computer)
    {
        return view('computers.show', [
            'computer' => Computer::findOrFail($computer)
        ]);
        // $index = Computer::findOrFail($computer);
        // $index = array_search($computer, array_column($computers, 'id'));
        // if ($index === false) {
        //     abort(404);
        // }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $computer)
    {
        return view('computers.edit', [
            'computer' => Computer::findOrFail($computer)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $computer)
    {
        $request->validate([
            'computer-name' => 'required',
            'computer-origin' => 'required',
            'computer-price' => ['required', 'integer'],
        ]);

        $to_update = Computer::findOrFail($computer);
        $to_update->name = strip_tags($request->input('computer-name'));
        $to_update->origin = strip_tags($request->input('computer-origin'));
        $to_update->price = strip_tags($request->input('computer-price'));

        $to_update->save();

        return redirect()->route('computers.show', $computer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $computer)
    {
        $to_delete = Computer::findOrFail($computer);
        $to_delete->delete();
        return redirect()->route('computers.index');
        
    }
}
