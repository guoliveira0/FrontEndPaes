<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    public function render(): string {
        $stage = $_COOKIE['stage'] ?? '';
        setcookie('stage', '', 0);
        
        $path = public_path("/build/scenes/$stage/index.html");

        if (!File::exists($path)) {
            return to_route('home');
        }

        return File::get($path);
    }
}
