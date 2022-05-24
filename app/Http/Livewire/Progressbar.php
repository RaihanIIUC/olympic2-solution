<?php

namespace App\Http\Livewire;

use App\Http\Controllers\QueryController;
use App\Models\Sms;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Progressbar extends Component
{

    public $starts, $ends , $sms , $success , $error  , $percentage ;

    public function render()
    {

        $this->starts =  Session::get('start') ?? 'no value';
        $this->ends = Session::get('end') ?? 'no value';

        $this->sms = Sms::whereDate('created_at','>=', $this->starts)->whereDate('created_at','<=',$this->ends)->count();

        $this->success = Sms::where('status', 1)->count();

        $this->error = Sms::where('status', -1)->count();

        $this->percentage = ($this->success / $this->sms) * 100; 

        return view('livewire.progressbar');
    }
}
