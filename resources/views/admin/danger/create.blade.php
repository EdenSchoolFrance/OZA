@extends('app')

@section('content')
    <div class="content users">
        <div class="card card--add_work_unit">
            <form class="card-body" action="{{ route('admin.help.danger.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="name">Nom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="name" id="name" class="form-control @error('name') invalid @enderror" placeholder="Nom du danger" value="{{ old('name') }}" >
                            @error('name')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="info_danger">Info</label>
                        </div>
                        <div class="right">
                            <textarea name="info_danger" id="info_danger" class="form-control @error('info_danger') invalid @enderror" placeholder="Marie">{{ old('info_danger') }}</textarea>
                            @error('info_danger')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line line--reflection">
                        <div class="left left-cancel">
                            <label for="reflection">Réflexion(s)</label>
                        </div>
                        <div class="right">
                            <ul class="ul-textarea">
                                @if(old('reflection'))
                                    @foreach(old('reflection') as $activitie)
                                        <li>
                                            <button type="button" class="btn btn-text btn-small btn-delete"><i class="far fa-times-circle"></i></button>
                                            <textarea class="form-control auto-resize" placeholder="" name="reflection[]">{{ $reflection }}</textarea>
                                        </li>
                                    @endforeach

                                @endif
                                <li>
                                    <button type="button" class="btn btn-text btn-yellow btn-add-reflection"><i class="fas fa-plus"></i> Ajouter une reflexion</button>
                                </li>
                                <li>
                                    @error('reflection')
                                    <p class="message-error">{{ $message }}</p>
                                    @enderror
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row row--submit">
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/app/danger.js"></script>
@endsection
