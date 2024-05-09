<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BonusController extends Controller
{
    // Index
    public function index()
    {
        $bonuses = Bonus::orderBy('id', 'desc')->paginate(5);
        return view('bonus.index', compact('bonuses'));
    }

    public function create()
    {
        return view('bonus.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'total_bonus' => 'required|numeric',
            'employee1' => 'required|string',
            'percentage1' => 'required|numeric|min:0|max:100',
            'employee2' => 'required|string',
            'percentage2' => 'required|numeric|min:0|max:100',
            'employee3' => 'required|string',
            'percentage3' => 'required|numeric|min:0|max:100',
        ]);

        $totalBonus = $request->input('total_bonus');
        $percentage1 = $request->input('percentage1') / 100;
        $percentage2 = $request->input('percentage2') / 100;
        $percentage3 = $request->input('percentage3') / 100;

        $totalPercentage = $percentage1 + $percentage2 + $percentage3;

        if ($totalPercentage != 1) {
            return redirect()->back()->with('error', 'Pembagian bonus masih salah. Total persentase harus 100%.');
        }

        $bonus1 = $totalBonus * $percentage1;
        $bonus2 = $totalBonus * $percentage2;
        $bonus3 = $totalBonus * $percentage3;

        // Simpan data ke database
        Bonus::create([
            'total_bonus' => $totalBonus,
            'employee1' => $request->input('employee1'),
            'percentage1' => $percentage1,
            'bonus1' => $bonus1,
            'employee2' => $request->input('employee2'),
            'percentage2' => $percentage2,
            'bonus2' => $bonus2,
            'employee3' => $request->input('employee3'),
            'percentage3' => $percentage3,
            'bonus3' => $bonus3,
        ]);

        return redirect()->route('bonus.index')->with('success', 'Bonus berhasil dihitung dan disimpan');
    }

    public function show(string $id): View
    {
        //get post by ID
        $bonus = Bonus::findOrFail($id);

        //render view with bonus
        return view('bonus.show', compact('bonus'));
    }

    public function edit(string $id): Response
    {
        $bonus = Bonus::findOrFail($id);

        return response(view('bonus.edit', ['bonus' => $bonus]));
    }

    public function update(Request $request, Bonus $bonus, string $id)
    {
        $bonus = Bonus::findOrFail($id);
        if ($bonus->update($request->validate([
            'total_bonus' => 'required|numeric',
            'employee1' => 'required|string',
            'percentage1' => 'required|numeric|min:0|max:100',
            'employee2' => 'required|string',
            'percentage2' => 'required|numeric|min:0|max:100',
            'employee3' => 'required|string',
            'percentage3' => 'required|numeric|min:0|max:100',
        ]))) {

            $totalBonus = $request->input('total_bonus');
            $percentage1 = $request->input('percentage1') / 100;
            $percentage2 = $request->input('percentage2') / 100;
            $percentage3 = $request->input('percentage3') / 100;

            $totalPercentage = $percentage1 + $percentage2 + $percentage3;

            if ($totalPercentage != 1) {
                return response()->json(['error' => 'Pembagian bonus masih salah. Total persentase harus 100%.'], 422);
            }

            $bonus1 = $totalBonus * $percentage1;
            $bonus2 = $totalBonus * $percentage2;
            $bonus3 = $totalBonus * $percentage3;

            // Update data ke database
            $bonus->update([
                'total_bonus' => $totalBonus,
                'employee1' => $request->input('employee1'),
                'percentage1' => $percentage1,
                'bonus1' => $bonus1,
                'employee2' => $request->input('employee2'),
                'percentage2' => $percentage2,
                'bonus2' => $bonus2,
                'employee3' => $request->input('employee3'),
                'percentage3' => $percentage3,
                'bonus3' => $bonus3,
            ]);

            return redirect()->route('bonus.index')->with('success', 'Data berhasil di update');

        }
    }

    public function destroy(string $id): RedirectResponse
    {
        $bonus = Bonus::findOrFail($id);

        if ($bonus->delete()) {
            return redirect(route('bonus.index'))->with('success', 'Deleted!');
        }

        return redirect(route('bonus.index'))->with('error', 'Sorry, unable to delete this!');
    }
}
