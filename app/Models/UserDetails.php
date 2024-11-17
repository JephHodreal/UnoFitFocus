<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class UserDetails extends Model
    {
        use HasFactory;

        protected $table = 'user_info';
        protected $primaryKey = 'user_info_id';
    
        protected $fillable = ['user_id', 'first_name', 'middle_name', 'last_name', 'age', 'height',
            'weight', 'bmi', 'gender', 'profile_pic',];
    
        public function loginUser()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
    }
?>