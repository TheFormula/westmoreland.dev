@extends('layouts.admin-master')

@section('content')

	<div>
        <div data-ng-hide="checkIfOwnPage()" data-ng-cloak="" class="no-print">


            <aside data-ng-include=" 'app/views/navigation.html' " id="nav-container"></aside>
        </div>


        <section data-ng-view="" id="content" class="animate-fade-up"></section>
    </div>
    <div class="page-loading-overlay"> <div class="loader-2"></div> </div>

    <div class="load_circle_wrapper">

        <div class="loading_spinner">
            <div id="wrap_spinner">
                <div class="loading outer">
                    <div class="loading inner"></div>
                </div>
            </div>
        </div>
    </div>

@stop