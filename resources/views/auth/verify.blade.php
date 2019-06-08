@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 mb-5">
                <div class="card-header">{{ __('Confirmer votre adresse e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de confirmation a été envoyé à votre adresse e-mail.') }}
                        </div>
                    @endif

                    {{ __('Avant de procéder, veuillez vérifier que vous n'avez pas reçu de lien de confirmation à votre adresse e-mail.) }}
                    {{ __('Si vous n'avez pas reçu de mail) }}, <a href="{{ route('verification.resend') }}">{{ __('cliquez ici pour en demander un à nouveau.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
