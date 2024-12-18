<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BagAlbumsController extends Controller
{
    public function toggleBag(Request $request)
    {
        $userId = Auth::id(); // Ottieni l'ID dell'utente loggato
        $albumId = $request->input('item_id');

        if (!$userId || !$albumId) {
            return response()->json(['success' => false, 'message' => 'Dati non validi']);
        }

        // Controlla se il bag esiste
        $bagExists = DB::table('albums_in_carrelli')
            ->where('albums_id', $albumId)
            ->where('carrelli_id', $userId)
            ->exists();

        if ($bagExists) {
            // Se il bag esiste, rimuovilo
            DB::table('albums_in_carrelli')
                ->where('albums_id', $albumId)
                ->where('carrelli_id', $userId)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('albums_in_carrelli')->insert([
                'albums_id' => $albumId,
                'carrelli_id' => $userId
            ]);
        }

        return response()->json(['success' => true, 'inbag' => !$bagExists]);
    }
}