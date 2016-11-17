<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
  /*
   id         | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| created_at | timestamp        | YES  |     | NULL    |                |
| updated_at | timestamp        | YES  |     | NULL    |                |
| student_id | int(11)          | NO   |     | NULL    |                |
| company_id | int(11)          | NO   |     | NULL    |                |
| creator_id | int(11)          | NO   |     | NULL    |                |
| vacant_id  | int(11)          | NO   |     | NULL    |                |
| contact    | varchar(255)     | NO   |     | NULL    |                |
| email      | varchar(255)     | NO   |     | NULL    |                |
| phone      | varchar(255)     | NO   |     | NULL    |                |
| address    | varchar(255)     | NO   |     | NULL    |                |
| city       | varchar(255)     | NO   |     | NULL    |                |
| state      | varchar(255)     | NO   |     | NULL    |                |
| date       | date             | YES  |     | NULL    |                |
| time       | time
  */
    //
    protected $fillable = ['student_id','company_id','creator_id', 'vacant_id'];


    //modelosrelacionados
    function company(){
      return $this->belongsTo("App\models\Company");
    }

    //modelosrelacionados
    function student(){
      return $this->belongsTo("App\models\Student");
    }

    function vacancy(){
      return $this->belongsTo("App\models\Vacant", "vacant_id");
    }

}
