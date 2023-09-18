<?php

namespace OmidSandi\Statistics\Models;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
        protected $fillable=['ip','user_agent','user_id'];
}
