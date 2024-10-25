<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    // Add any relationships or custom methods here
    public function getFullNameAttribute()
    {
        return ucfirst($this->name);
    }

    public function isAuthenticated()
    {
        return isset($_SESSION['user']) && $_SESSION['user'] == $this->id;
    }
}