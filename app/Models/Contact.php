<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function getFullNameAttribute(){
        return "{$this->lastName}{$this->firstName}";
    }

    use HasFactory;

    protected $fillable = ['lastName','firstName', 'full_name', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];

    public static $rules = array(
        'lastName' => 'required|string|max:255',
        'firstName' => 'required|string|max:255',
        'full_name' => 'string|max:255',
        'gender' => 'required',
        'email' => 'required|email|max:255',
        'postcode' => ['required','regex:{[0-9]{3}[-][0-9]{4}}'],
        'address' => 'required|max:255',
        'building_name' => 'max:255',
        'opinion' => 'required|max:120',
    );
}
