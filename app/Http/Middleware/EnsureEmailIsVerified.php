<?php

public function handle($request, Closure $next)
{
    if (!$request->user() || !$request->user()->hasVerifiedEmail()) {
        return redirect()->route('verification.notice');
    }

    return $next($request);
}
