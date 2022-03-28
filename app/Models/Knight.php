<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Faker;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Knight extends Model
{
    use HasFactory;
    const API_FAKE_NAME = "https://api.namefake.com/";
    const API_FAKE_PIC = "https://randomuser.me/api/";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'age', 'health', 'courage', 'justice', 'mercy', 'generosity', 'faith', 'nobility', 'hope', 'strength', 'defence', 'battle'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'age' => 'int',
    ];


    public function getFakeName(): string
    {
        $name = @file_get_contents(self::API_FAKE_NAME);
        if (!$name) {
            $faker = Faker\Factory::create();

            return $faker->name;
        }
        return json_decode($name)->name;
    }

    public function getFakePic(): string
    {
        $pic  = @file_get_contents(self::API_FAKE_PIC);
        if(!$pic){
            return 'https://randomuser.me/api/portraits/med/men/69.jpg';
        }
        return json_decode($pic)->results[0]->picture->medium;
    }

    /**
     * Knight avg virtues.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function virtues(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($this->attributes['courage'] + $this->attributes['justice'] + $this->attributes['mercy'] 
            + $this->attributes['generosity'] + $this->attributes['faith'] + $this->attributes['nobility']
            + $this->attributes['hope']) / 7,
            set: fn ($value) => ($this->attributes['courage'] + $this->attributes['justice'] + $this->attributes['mercy'] 
            + $this->attributes['generosity'] + $this->attributes['faith'] + $this->attributes['nobility']
            + $this->attributes['hope']) / 7
        );
    }
}

