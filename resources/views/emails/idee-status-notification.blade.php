@component('mail::message')
# Notification de Statut de l'Idée

Bonjour {{ $idee->auteur_nom_complet }},

Nous voulons vous informer que le statut de votre idée intitulée **"{{ $idee->libelle }}"** a été mis à jour.

**Statut actuel :** {{ $status }}

@component('mail::button', ['url' => route('idees.show', $idee->id)])
Voir l'Idée
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
