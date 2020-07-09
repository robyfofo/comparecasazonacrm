<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LeadGenerationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lead_generation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.leadGenerations.index');
    }
}
