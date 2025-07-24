<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Event;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index() {
        
    $clubCount = Club::count();
    $eventCount = Event::where('date', '>=', now())->count();
    $taskCount = Task::where('status', 'pending')->count();

    return view('dashboard', compact('clubCount', 'eventCount', 'taskCount'));
    }
}
