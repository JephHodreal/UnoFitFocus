<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class StatsDashboard extends Model
    {
        use HasFactory;

        protected $table = 'workout_sessions';
        protected $primaryKey = 'session_id';
    
        protected $fillable = ['fk_user_id', 'exercise', 'difficulty', 'score', 'date_performed',];
    
        public function userStats()
        {
            return $this->belongsTo(User::class, 'fk_user_id');
        }
    }
?>