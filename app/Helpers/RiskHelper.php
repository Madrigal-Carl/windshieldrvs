<?php

if (!function_exists('risk_style')) {
    function risk_style($value)
    {
        if ($value >= 80) return ['label' => 'Very High', 'bg' => 'bg-red-600/15', 'text' => 'text-red-600'];
        if ($value >= 60) return ['label' => 'High', 'bg' => 'bg-orange-500/15', 'text' => 'text-orange-500'];
        if ($value >= 40) return ['label' => 'Medium', 'bg' => 'bg-yellow-500/15', 'text' => 'text-yellow-500'];
        if ($value >= 20) return ['label' => 'Low', 'bg' => 'bg-green-500/15', 'text' => 'text-green-500'];
        return ['label' => 'Very Low', 'bg' => 'bg-blue-500/15', 'text' => 'text-blue-500'];
    }
}
