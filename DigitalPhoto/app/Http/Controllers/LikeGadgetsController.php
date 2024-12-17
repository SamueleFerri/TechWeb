<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeGadgetsController extends Controller
{
    public function toggleLike(Request $request)
    {
        $userId = Auth::id(); // Ottieni l'ID dell'utente loggato
        $gadgetsId = $request->input('item_id');

        // Controlla se il like esiste
        $likeExists = DB::table('gadgets_in_preferiti')
            ->where('gadgets_id', $gadgetsId)
            ->where('preferiti_id', $userId) // Supponiamo che il campo `preferiti_id` sia collegato all'utente
            ->exists();

        if ($likeExists) {
            // Se il like esiste, rimuovilo
            DB::table('gadgets_in_preferiti')
                ->where('gadgets_id', $gadgetsId)
                ->where('preferiti_id', $userId)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('gadgets_in_preferiti')->insert([
                'gadgets_id' => $gadgetsId,
                'preferiti_id' => $userId
            ]);
        }

        return response()->json(['success' => true, 'liked' => !$likeExists]);
    }
}