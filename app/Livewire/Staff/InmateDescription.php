<?php

namespace App\Livewire\Staff;

use App\Models\DescriptiveInformation;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Livewire;
use Livewire\WithFileUploads;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\View\View;
use function Livewire\on;

class InmateDescription extends Component implements HasForms
{
    use InteractsWithForms;
    
    use WithFileUploads;

    public $inmate_id;

    public $info;
    public function mount(){
        $this->inmate_id = request('id');
        $this->info = DescriptiveInformation::where('inmate_id', $this->inmate_id)->first();
    }

    public $front = [];
    public $back = [];

  
    public function form(Form $form): Form
    {
        return $form
            ->schema([
              Grid::make(2)->schema([
                FileUpload::make('front')->required(),
                FileUpload::make('back')->required(),
              ])
            ]);
    }

    public function save(){
      
      $des = DescriptiveInformation::create([
        'inmate_id'  => $this->inmate_id,
      ]);
  
        foreach ($this->front as $key => $value) {
            $des->update([
                'front_path' => $value->store('Front', 'public'),
            ]);
        }
        foreach ($this->back as $key => $value) {
            $des->update([
                'back_path' => $value->store('Back', 'public'),
            ]);
        }

        return redirect()->route('staff.inmate-description', ['id' => $this->inmate_id]);

    }

    public function render()
    {
        return view('livewire.staff.inmate-description');
    }
   
   
}
