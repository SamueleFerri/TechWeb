<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BagGadgetsController extends Controller
{
    public function toggleBag(Request $request)
    {
        $userId = Auth::id(); // Ottieni l'ID dell'utente loggato
        $gadgetsId = $request->input('item_id');

        // Controlla se il bag esiste
        $bagExists = DB::table('gadgets_in_carrelli')
            ->where('gadgets_id', $gadgetsId)
            ->where('carrelli_id', $userId) // Supponiamo che il campo `carrelli_id` sia collegato all'utente
            ->exists();

        if ($bagExists) {
            // Se il bag esiste, rimuovilo
            DB::table('gadgets_in_carrelli')
                ->where('gadgets_id', $gadgetsId)
                ->where('carrelli_id', $userId)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('gadgets_in_carrelli')->insert([
                'gadgets_id' => $gadgetsId,
                'carrelli_id' => $userId
            ]);
        }

        return response()->json(['success' => true, 'inbag' => !$bagExists]);
    }
}