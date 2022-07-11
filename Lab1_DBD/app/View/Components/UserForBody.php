<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class UserForBody extends Component
{
    /**
     * Create a new component instance.
     *@param /app/models/User $user
     * @return void
     */
    public function __construct( $user = NULL)
    {
        //
        if($user == NULL){
            $user = User::make([]);
        }
        $this->user = $user;    
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $params = [
            'user' => $this->user,
        ];
        return view('components.user-for-body', $params);
    }
}
