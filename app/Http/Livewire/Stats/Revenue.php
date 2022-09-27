<?php

namespace App\Http\Livewire\Stats;

use App\Models\Order;
use NumberFormatter;
use Livewire\Component;

class Revenue extends Component
{
    public $revenue;
    public $selectedDays;

    public function mount()
    {
        $this->selectedDays = 30;
        $this->updateStat();
    }

    public function updateStat()
    { 
        $this->revenue = Order::where('created_at', '>=', now()->subDays($this->selectedDays))->sum('total');
        $this->revenue = (new NumberFormatter('zh', NumberFormatter::CURRENCY))->formatCurrency($this->revenue / 100, 'TWD');
    }

    public function render()
    {
        return view('livewire.stats.revenue');
    }
}
