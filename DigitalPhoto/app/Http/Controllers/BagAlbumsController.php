<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BagAlbumsController extends Controller
{
    public function toggleBag(Request $request)
    {
        $carrelli_list = DB::select('SELECT id FROM carrelli WHERE user_id = ?', [Auth::id()]);
        $carrelli_id = $carrelli_list[0]->id ?? null; 
        $albumId = $request->input('item_id');

        if (!$carrelli_id || !$albumId) {
            return response()->json(['success' => false, 'message' => 'Dati non validi']);
        }

        // Controlla se il bag esiste
        $bagExists = DB::table('albums_in_carrelli')
            ->where('albums_id', $albumId)
            ->where('carrelli_id', $carrelli_id)
            ->exists();

        if ($bagExists) {
            // Se il bag esiste, rimuovilo
            DB::table('albums_in_carrelli')
                ->where('albums_id', $albumId)
                ->where('carrelli_id', $carrelli_id)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('albums_in_carrelli')->insert([
                'albums_id' => $albumId,
                'carrelli_id' => $carrelli_id
            ]);
        }

        return response()->json(['success' => true, 'inbag' => !$bagExists]);
    }
}