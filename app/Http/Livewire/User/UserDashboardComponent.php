<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserDashboardComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function updateOrderStatus($orderid,$status)
    {
        $order = Order::find($orderid);
        $order->status = $status;

        if($status == 'canceled')
        {
            $order->cancel_date = DB::raw('CURRENT_DATE');
        }

        $order->update();

        return redirect()->route('dashboard')->with('message','Order cancel has been successfully!');
    }

    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'current_password'=>'required',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);
    }

    public function changePassword()
    {
        $this->validate([
            'current_password'=>'required',
            'password' => 'required|min:8|confirmed|different:current_password'
        ]);
        
        if(Hash::check($this->current_password,Auth::user()->password))
        {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->update();
            session()->flash('password_success','Password has been changed successfully!');
        }
        else
        {
            session()->flash('password_error','Password does not match!');
        }
    }


    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(6);

        return view('livewire.user.user-dashboard-component',['orders'=>$orders])->layout('website.layouts.base');
    }
}
