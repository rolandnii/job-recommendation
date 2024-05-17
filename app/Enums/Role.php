<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Role : string implements HasLabel
{
    case  Student  = 'student';
    case Company = 'company';
    case Admin = 'admin';

   public function getLabel(): ?string
   {
       return  match ($this) {
           self::Student => "student",
           self::Company => "company",
           self::Admin => "admin",
       };
   }
}
