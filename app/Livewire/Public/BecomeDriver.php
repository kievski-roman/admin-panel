<?php

namespace App\Livewire\Public;

use Livewire\Attributes\Validate;
use App\Models\DriverRequest;
use Livewire\Component;

class BecomeDriver extends Component
{


    #[Validate('required', 'string', 'min:2', 'max:100')]
    public string $first_name = '';
    #[Validate('required', 'string', 'min:2', 'max:100')]
    public string $last_name = '';
    #[Validate('required', 'date', 'before:today')]
    public ?string $birthday = null;

    public function submit(): void
    {
        $data = $this->validate();

        $data['first_name'] = mb_convert_case(trim($data['first_name']), MB_CASE_TITLE, 'UTF-8');
        $data['last_name'] = mb_convert_case(trim($data['last_name']), MB_CASE_TITLE, 'UTF-8');

        DriverRequest::create($data);
        session()->flash('ok', 'Дякуємо! Ми отримали вашу заявку.');
        $this->reset(['first_name', 'last_name', 'birthday']);
    }

    public function render()
    {
        return view('livewire.public.become-driver');
    }
}
