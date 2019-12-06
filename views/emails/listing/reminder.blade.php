<div>
  Beste {{ $contact->first_name }},<br /><br />

  Jouw gezochte onderdelen zijn de afgelopen 7 dagen zichtbaar geweest voor alle aangesloten bedrijven.<br />
  Heb je het onderdeel al ontvangen dan willen we je vragen om deze via deze <a href="{{ route('frontend.listing.signoff', [$listing, $listing->slug]) }}" title="Afmelden">afmeldlink</a> met de afmeldcode ( {{ Hashids::encode($listing->part->id) }} ) af te melden.<br />
  Alvast dank!<br /><br />

  Heb je nog vragen? Vul het <a href="{{ route('frontend.contact') }}" title="Contactformulier">contactformulier</a> in.<br /><br /><br />


  Met vriendelijke groet,<br />
  AutoOnderdelenSite.nl<br /><br />
</div>
