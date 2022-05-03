@extends('app')

@section('content')


<div class="content">
    <form action="{{ route('admin.help.subitem.update', [$subitem->id]) }}" class="card card--add-risk" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="line">
                    <div class="left">
                        <label for="nameSubItem">Intitulé de la catégorie</label>
                    </div>
                    <div class="right">
                        <input type="text" class="form-control" name="name_subitem" id="workSubItem" value="@if(old('name_subitem')){{ old('name_subitem') }}@else{{ isset($subitem) ? $subitem->name : '' }}@endif">
                    </div>
                </div>
                @error('name_subitem')
                    <div class="line">
                        <div class="left"></div>
                        <div class="right">
                            <p class="message-error">{{ $message }}</p>
                        </div>
                    </div>
                @enderror
            </div>

            <div class="row row--submit">
                <button class="btn btn-success">Mettre à jour la catégorie</button>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')

@endsection
