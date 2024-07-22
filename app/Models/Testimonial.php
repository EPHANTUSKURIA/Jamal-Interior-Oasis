<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    // Specify the table name if it’s not the plural form of the model name
    // protected $table = 'testimonials';

    // Specify if timestamps are not used in your table
    // public $timestamps = false;

    // Define fillable fields for mass assignment
    protected $fillable = ['content', 'author'];

    // Add any relationships if necessary
}