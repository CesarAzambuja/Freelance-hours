<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Create extends Component
{

    public Project $project;
    public bool $modal = true;

    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required', 'numeric', 'gt:0'])]
    public int $hours = 0; 

    public bool $agree = false;

    protected array $rules = [
        'email' => ['required', 'email'],
        'hours' => ['required', 'numeric', 'gt:0'],
    ];

    public function save(){

        if(!$this->agree){
            $this->addError('agree', 'Você precisa concordar com os termos');
            return;
        }
        $this->validate();

        $this->project->proposals()
            ->updateOrCreate(
                ['email' => $this->email],
                ['hours' => $this->hours]
        );


    }





    public function render()
    {
        return view('livewire.proposals.create');
    }
}
