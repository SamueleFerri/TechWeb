<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BagCoursesController extends Controller
{
    public function toggleBag(Request $request)
    {
        $carrelli_list = DB::select('SELECT id FROM carrelli WHERE user_id = ?', [Auth::id()]);
        $carrelli_id = $carrelli_list[0]->id ?? null; 
        $coursesId = $request->input('item_id');

        // Controlla se il like esiste
        $bagExists = DB::table('corsi_in_carrelli')
            ->where('corsi_id', $coursesId)
            ->where('carrelli_id', $carrelli_id)
            ->exists();

        if ($bagExists) {
            // Se il like esiste, rimuovilo
            DB::table('corsi_in_carrelli')
                ->where('corsi_id', $coursesId)
                ->where('carrelli_id', $carrelli_id)
                ->delete();
        } else {
            // Altrimenti, aggiungilo
            DB::table('corsi_in_carrelli')->insert([
                'corsi_id' => $coursesId,
                'carrelli_id' => $carrelli_id
            ]);
        }

        return response()->json(['success' => true, 'inbag' => !$bagExists]);
    }
}