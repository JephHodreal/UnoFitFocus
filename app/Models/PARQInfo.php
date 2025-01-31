<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    
    class PARQInfo extends Model
    {
        use HasFactory;

        protected $table = 'parq_answers';
        protected $primaryKey = 'parq_id';
    
        protected $fillable = ['fk_userparq_id', 'heart_condition', 'chest_pain_phys', 'chest_pain_non_phys', 'balance_loss', 
            'bone_joint_problem', 'drug_prescrip', 'other_reason',];
    
        public function loginUser()
        {
            return $this->belongsTo(User::class, 'fk_userparq_id');
        }
    }
?>