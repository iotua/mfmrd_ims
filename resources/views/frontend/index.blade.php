@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> @lang('navs.general.home')
                </div>
                <div class="card-body">
                   <h1 align='center'> @lang('strings.frontend.welcome_to', ['place' => app_name()]) </h1>
                    <img src='img/logo.jpg' style="width:1050px;height:400px;" class="center" />
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->       
@endsection
