@extends('app')

@section('content')
    <div class="content">
        <div class="card card--users">
            <form class="card-body" action="{{ route('user.client.update', [$single_document->id, $user->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="line">
                        <div class="left">
                            <label for="firstname">Prénom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') invalid @enderror" placeholder="Indiquer le prénom" value="{{ old('firstname') ? old('firstname') : $user->firstname }}" required>
                            @error('firstname')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="lastname">Nom</label>
                        </div>
                        <div class="right">
                            <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') invalid @enderror" placeholder="Indiquer le nom" value="{{ old('lastname') ? old('lastname') : $user->lastname }}" required>
                            @error('lastname')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="post">Poste</label>
                        </div>
                        <div class="right">
                            <input type="text" name="post" id="post" class="form-control @error('post') invalid @enderror" placeholder="Indiquer le post" value="{{ old('post') ? old('post') : $user->post }}" required>
                            @error('post')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="email">Email</label>
                        </div>
                        <div class="right">
                            <input type="email" name="email" id="email" class="form-control @error('email') invalid @enderror" placeholder="Indiquer l'email" value="{{ old('email') ? old('email') : $user->email }}" required>
                            @error('email')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="phone">Téléphone</label>
                        </div>
                        <div class="right">
                            <input type="tel" name="phone" id="phone" class="form-control @error('phone') invalid @enderror" placeholder="00 00 00 00 00" value="{{ old('phone') ? old('phone') : $user->phone }}" required>
                            @error('phone')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="role">Role</label>
                        </div>
                        <div class="right">
                            <select class="form-control" name="role" id="role" required>
                                <option value="">Sélectioner un role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role') ? (old('role') == $role->id ? 'selected' : '') : ($user->role->id == $role->id ? 'selected' : '') }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="line">
                        <div class="left">
                            <h3>Modifier le mot de passe</h3>
                        </div>
                        <div class="right">
                            <i class="far fa-question-circle" data-tooltip=".tooltip--info-reset-password" data-placement="top"></i>
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="password">Mot de passe</label>
                        </div>
                        <div class="right">
                            <div class="align">
                                <input type="password" name="password" id="password" class="form-control @error('password') invalid @enderror" placeholder="Mot de passe">
                                <i class="far fa-question-circle" data-tooltip=".tooltip--password" data-placement="top"></i>
                            </div>
                            @error('password')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="line">
                        <div class="left">
                            <label for="password_confirmation">Confirmation du mot de passe</label>
                        </div>
                        <div class="right">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') invalid @enderror" id="password_confirmation" placeholder="Confirmer le mot de passe">
                            @error('password_confirmation')
                                <p class="message-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row row--submit">
                    <div class="line">
                        <div class="left">
                        </div>
                        <div class="right">
                            <button type="submit" class="btn btn-success">Mettre à jour le client</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="tooltip tooltip--info-reset-password">
            <p>Si vous souhaitez réinitialiser le mot de passe de cet utilisateur,</p>
            <p>vous pouvez remplir cette partie.</p>
        </div>

        <div class="tooltip tooltip--password">
            <p>Votre mot de passe doit contenir au moins 8 caractères, dont : </p>
            <p>1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial</p>
        </div>
    </div>
@endsection

@section('script')
@endsection
