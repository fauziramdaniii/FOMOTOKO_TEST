<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HiddenItem;

class HiddenItemController extends Controller
{
    public function index()
    {
        // Buat grid dan atur item tersembunyi
        $grid = [
            ['#', '.', '.', '.', '.', '.', '#'],
            ['.', '#', '#', '#', '.', '.', '#'],
            ['.', '.', '.', '.', '#', '.', '.'],
            ['#', '.', '.', '.', '#', '#', '.'],
            ['#', 'X', '#', '.', '.', '.', '.'],
            ['#', '#', '#', '#', '#', '#', '#'],
        ];

        $playerX = 1;
        $playerY = 4;
        $steps = ['A' => 1, 'B' => 2, 'C' => 3];

        // Inisialisasi model dan simpan data grid
        $hiddenItem = new HiddenItem;
        $hiddenItem->grid = json_encode($grid);
        $hiddenItem->player_x = $playerX;
        $hiddenItem->player_y = $playerY;
        $hiddenItem->steps = json_encode($steps);
        $hiddenItem->save();

        return view('hidden_item.index', compact('hiddenItem'));
    }
}
