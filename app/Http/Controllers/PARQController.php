<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\PARQInfo;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PARQController extends Controller
{
    /**
     * Display the PARQ view.
     */
    public function create(): View
    {
        return view('PARQ');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        // $user_parq = PARQInfo::where('fk_userparq_id', Auth::id())->first();
        // Validate the request data to allow only "Yes" or "No"
        $request->validate([
            'heart_condition' => 'required|in:Yes,No',
            'chest_pain_phys' => 'required|in:Yes,No',
            'chest_pain_non_phys' => 'required|in:Yes,No',
            'balance_loss' => 'required|in:Yes,No',
            'bone_joint_problem' => 'required|in:Yes,No',
            'drug_prescrip' => 'required|in:Yes,No',
            'other_reason' => 'required|in:Yes,No',
        ]);

        // Retrieve existing PARQInfo record or create a new one
        $user_parq = PARQInfo::firstOrNew(['fk_userparq_id' => Auth::id()]);

        $user_parq->heart_condition = $request->heart_condition;
        $user_parq->chest_pain_phys = $request->chest_pain_phys;
        $user_parq->chest_pain_non_phys = $request->chest_pain_non_phys;
        $user_parq->balance_loss = $request->balance_loss;
        $user_parq->bone_joint_problem = $request->bone_joint_problem;
        $user_parq->drug_prescrip = $request->drug_prescrip;
        $user_parq->other_reason = $request->other_reason;

        // Set user ID (only if it's a new record)
        $user_parq->fk_userparq_id = Auth::id();

        $user_parq->save();

        // Check if any answer is 'Yes'
        $hasHealthCondition = in_array('Yes', [
            $request->heart_condition,
            $request->chest_pain_phys,
            $request->chest_pain_non_phys,
            $request->balance_loss,
            $request->bone_joint_problem,
            $request->drug_prescrip,
            $request->other_reason,
        ]);

        // Update UserDetails health_condition
        $user_info = UserDetails::where('user_id', Auth::id())->first();
        if ($user_info) {
            $user_info->update([
                'health_condition' => $hasHealthCondition ? 'Yes' : 'No'
            ]);
        } else {
            UserDetails::create([
                'user_id' => Auth::id(),
                'health_condition' => $hasHealthCondition ? 'Yes' : 'No'
                // Add any other required fields with default values
            ]);
        }

        return Redirect::route('profile.edit')->with('status', 'PAR-Q information saved.');
    }
}
