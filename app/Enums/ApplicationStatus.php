<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ApplicationStatus : string
{
    case Pending = 'pending';
    case Shortlisted = 'shortlisted';
    case Approved = 'approved';
    case  Rejected = 'rejected';

//    public function getLabel(): ?string
//    {
//        return  match ($this) {
//            self::Rejected => 'rejected',
//            self::Shortlisted => 'shortlisted',
//            self::Approved => 'approved',
//            self::Pending => 'pending',
//        };
//    }
}
