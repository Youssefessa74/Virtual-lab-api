@extends('admin.body.dashboard')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Elements</h1>
            </div>
            <div class="card-body">

                 <a  style="margin: 25px"  class="btn btn-inverse-primary"
                    href="{{ route('subject.create') }}">Create</a>
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
{{-- @push('scripts') --}}
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
{{-- @endpush --}}
