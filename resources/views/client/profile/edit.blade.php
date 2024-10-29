@extends('client.layouts.app')
@section('content')
<div class="max-w-screen-xl mx-auto mt-16">
    <hr class="mb-8">
    <div class="flex flex-col lg:flex-row gap-8">
        @include('client.layouts.ProfileAppDrawer')
        <div class="form-sections basis-7/12">
            @include('client.profile.partials.update-profile-information-form')
            @include('client.profile.partials.update-password-form')
        </div>
    </div>
</div>
@endsection