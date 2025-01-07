<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BagGadgetsController extends Controller
{
    public function toggleBag(Request $request)
    {
        $carrelli_list = DB::select('SELECT id FROM carrelli WHERE user_id = ?', [Auth::id()]);
        $carrelli_id = $carrelli_list[0]->id ?? null; 
        $gadgetsId = $request->input('item_id');

        // Controlla se il bag esiste
        $bagExists = DB::table('gadgets_in_carrelli')
            ->where('gadgets_id', $gadgetsId)
            ->where('carrelli_id', $carrelli_id)
            ->exists();

        if ($bagExists) {
            // Se il bag esiste, rimuovilo
            DB::table('gadgets_in_carrelli')
                ->where('gadgets_id', $gadgetsId)
                ->where('carrelli_id', $carrelli_id)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('gadgets_in_carrelli')->insert([
                'gadgets_id' => $gadgetsId,
                'carrelli_id' => $carrelli_id
            ]);
        }

        return response()->json(['success' => true, 'inbag' => !$bagExists]);
    }
}