<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum JobType : string implements  HasLabel
{
   case  PartTime = "part-time";
   case  FullTime = "full-time";
   case Contract = "contract";

   public function getLabel(): ?string
   {
       return  match ($this) {
           self::Contract => 'Contract',
           self::PartTime => 'Part Time',
           self::FullTime => 'Full Time',
       };
   }
}
