<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $alert_type;
    public $alert_title;
    public $alert_content;
    public function __construct($type, $title, $content)
    {
        // Variable type berisi value dari atribut type di index.blade.php
        // Masukkan ke dalam variable alert_type, tampilkan di view alert.blade.php
        $this->alert_type = $type;
        $this->alert_title = $title;
        $this->alert_content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
