@extends('layouts.admin-master')

@section('content')
    <br><br><br><div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">Overview</h4>
                    <select class="custome-select border-0 pr-3">
                        <option selected>Last 24 Hours</option>
                        <option value="0">01 July 2018</option>
                    </select>
                </div>
                <div id="verview-shart"></div>
            </div>
        </div>
    </div>
@endsection
