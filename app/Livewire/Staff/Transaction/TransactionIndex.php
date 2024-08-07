<?php

namespace App\Livewire\Staff\Transaction;

use App\Models\Product;
use App\Models\Transaction;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numberOfPaginatorsRendered = [];

    public $search = '';

    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Transaksi',
        'active' => 'transaksi'
    ])]


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function delete($id)
    {
        $transaction = Transaction::find($id);
        $product = Product::find($transaction->product_id);
        $product->update([
            'stock' => $product->stock + $transaction->quantity
        ]);

        $transaction->delete();
        session()->flash('success', 'Transaksi berhasil dibatalkan!');
    }

    public function render()
    {
        return view('livewire.staff.transaction.transaction-index', [
            'transactions' => Transaction::with('product')
                    ->whereHas('product', function($query) {
                        $query->where('product_name', 'like', '%'.$this->search.'%');
                    })
                    ->orderBy('id', 'desc')
                    ->paginate(10)
        ]);
    }
}
