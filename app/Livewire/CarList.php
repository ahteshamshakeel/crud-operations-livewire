<?php

namespace App\Livewire;

use App\Models\car;
use Livewire\Component;
use Livewire\WithPagination;



class CarList extends Component
{
    use WithPagination;


     public $delete_id;
     public $listeners = ['deleteconfirmed' => 'deletecarbyid'];


 public $query = '';

    public function search()
    {
        $this->resetPage();
    }




    public function render()
    {
        $cars = car::
        where('car_name', 'like', '%' . $this->query . '%') ->orderBy('created_at', 'desc')
        ->orWhere('brand', 'like', '%' . $this->query . '%')
             ->orWhere('fuel_type', 'like', '%' . $this->query . '%')
             ->orWhere('engine_capacity', 'like', '%' . $this->query . '%')
        ->paginate(10);

    return view('livewire.car-list', compact('cars'));
    }





    public function deletecarbyid(){
        $carid = car::where('id' , $this->delete_id)->delete();
        $this->dispatch('cardeleted');
    }
    public function deleteCar($carId)
    {
       $this->delete_id = $carId;
       $this->dispatch('show-delete-confirmation');

    }
}
