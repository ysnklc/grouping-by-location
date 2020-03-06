<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscriber
 * @package App
 *
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string mail
 * @property string phone
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Subscriber extends Model
{
    protected $table = 'subscriber';
}
