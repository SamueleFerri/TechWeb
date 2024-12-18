<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BagCoursesController extends Controller
{
    public function toggleBag(Request $request)
    {
        $userId = Auth::id(); // Ottieni l'ID dell'utente loggato
        $coursesId = $request->input('item_id');

        // Controlla se il like esiste
        $bagExists = DB::table('corsi_in_carrelli')
            ->where('corsi_id', $coursesId)
            ->where('carrelli_id', $userId) // Supponiamo che il campo `preferiti_id` sia collegato all'utente
            ->exists();

        if ($bagExists) {
            // Se il like esiste, rimuovilo
            DB::table('corsi_in_carrelli')
                ->where('corsi_id', $coursesId)
                ->where('carrelli_id', $userId)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('corsi_in_carrelli')->insert([
                'corsi_id' => $coursesId,
                'carrelli_id' => $userId
            ]);
        }

        return response()->json(['success' => true, 'inbag' => !$bagExists]);
    }
}