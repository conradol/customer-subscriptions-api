<?php
namespace App\Repositories;

use App\Models\Pet;

class PetRepository 
{
    public function delete($id)
    {
        $pet = Pet::find($id);

        if ($pet) {
            return $pet->delete();
        }

        return false;
    }
}