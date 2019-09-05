<?php

namespace App\Mail;

use App\Inventory;
use App\Category;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovalRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $inventory = Inventory::latest()->first();
        $user = User::find($inventory->user_id);
        $category = Category::find($inventory->category_id);
        return $this->view('mail.approval-request')->with([
          'user'=> $user->name,
          'inventory' => $inventory->inventory,
          'category'=> $category->category,
          'amount' => $inventory->amount
        ]);
    }
}
