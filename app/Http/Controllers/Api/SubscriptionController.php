<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Models\UserSubscription;

class SubscriptionController extends Controller
{
    public function store(SubscriptionRequest $request)
    {
        $userSubscription = UserSubscription::create($request->validated());
        if($userSubscription->id) {
            return response()->json(['status' => 'success', 'message' => 'Successfully subscribed to website']);
        }
        return response()->json(['status' => 'failure'], 422);
    }
}
